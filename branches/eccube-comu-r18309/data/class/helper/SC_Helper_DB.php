<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2007 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * DB関連のヘルパークラス.
 *
 * @package Helper
 * @author LOCKON CO.,LTD.
 * @version $Id:SC_Helper_DB.php 15532 2007-08-31 14:39:46Z nanasess $
 */
class SC_Helper_DB {

    // {{{ properties

    /** ルートカテゴリ取得フラグ */
    var $g_root_on;

    /** ルートカテゴリID */
    var $g_root_id;

    /** 選択中カテゴリ取得フラグ */
    var $g_category_on;

    /** 選択中カテゴリID */
    var $g_category_id;

    // }}}
    // {{{ functions

    /**
     * データベースのバージョンを所得する.
     *
     * @param string $dsn データソース名
     * @return string データベースのバージョン
     */
    function sfGetDBVersion($dsn = "") {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();
        return $dbFactory->sfGetDBVersion($dsn);
    }

    /**
     * テーブルの存在をチェックする.
     *
     * @param string $table_name チェック対象のテーブル名
     * @param string $dsn データソース名
     * @return テーブルが存在する場合 true
     */
    function sfTabaleExists($table_name, $dsn = "") {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();
        $dsn = $dbFactory->getDSN($dsn);

        $objQuery = new SC_Query($dsn, true, true);
        // 正常に接続されている場合
        if(!$objQuery->isError()) {
            list($db_type) = split(":", $dsn);
            $sql = $dbFactory->getTableExistsSql();
            $arrRet = $objQuery->getAll($sql, array($table_name));
            if(count($arrRet) > 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * カラムの存在チェックと作成を行う.
     *
     * チェック対象のテーブルに, 該当のカラムが存在するかチェックする.
     * 引数 $add が true の場合, 該当のカラムが存在しない場合は, カラムの生成を行う.
     * カラムの生成も行う場合は, $col_type も必須となる.
     *
     * @param string $table_name テーブル名
     * @param string $column_name カラム名
     * @param string $col_type カラムのデータ型
     * @param string $dsn データソース名
     * @param bool $add カラムの作成も行う場合 true
     * @return bool カラムが存在する場合とカラムの生成に成功した場合 true,
     *               テーブルが存在しない場合 false,
     *               引数 $add == false でカラムが存在しない場合 false
     */
    function sfColumnExists($table_name, $col_name, $col_type = "", $dsn = "", $add = false) {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();
        $dsn = $dbFactory->getDSN($dsn);

        // テーブルが無ければエラー
        if(!$this->sfTabaleExists($table_name, $dsn)) return false;

        $objQuery = new SC_Query($dsn, true, true);
        // 正常に接続されている場合
        if(!$objQuery->isError()) {
            list($db_type) = split(":", $dsn);

            // カラムリストを取得
            $arrRet = $dbFactory->sfGetColumnList($table_name);
            if(count($arrRet) > 0) {
                if(in_array($col_name, $arrRet)){
                    return true;
                }
            }
        }

        // カラムを追加する
        if($add){
            $objQuery->query("ALTER TABLE $table_name ADD $col_name $col_type ");
            return true;
        }
        return false;
    }

    /**
     * インデックスの存在チェックと作成を行う.
     *
     * チェック対象のテーブルに, 該当のインデックスが存在するかチェックする.
     * 引数 $add が true の場合, 該当のインデックスが存在しない場合は, インデックスの生成を行う.
     * インデックスの生成も行う場合で, DB_TYPE が mysql の場合は, $length も必須となる.
     *
     * @param string $table_name テーブル名
     * @param string $column_name カラム名
     * @param string $index_name インデックス名
     * @param integer|string $length インデックスを作成するデータ長
     * @param string $dsn データソース名
     * @param bool $add インデックスの生成もする場合 true
     * @return bool インデックスが存在する場合とインデックスの生成に成功した場合 true,
     *               テーブルが存在しない場合 false,
     *               引数 $add == false でインデックスが存在しない場合 false
     */
    function sfIndexExists($table_name, $col_name, $index_name, $length = "", $dsn = "", $add = false) {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();
        $dsn = $dbFactory->getDSN($dsn);

        // テーブルが無ければエラー
        if (!$this->sfTabaleExists($table_name, $dsn)) return false;

        $objQuery = new SC_Query($dsn, true, true);
        $arrRet = $dbFactory->getTableIndex($index_name, $table_name);

        // すでにインデックスが存在する場合
        if(count($arrRet) > 0) {
            return true;
        }

        // インデックスを作成する
        if($add){
            $dbFactory->createTableIndex($index_name, $table_name, $col_name, $length());
            return true;
        }
        return false;
    }

    /**
     * データの存在チェックを行う.
     *
     * @param string $table_name テーブル名
     * @param string $where データを検索する WHERE 句
     * @param string $dsn データソース名
     * @param string $sql データの追加を行う場合の SQL文
     * @param bool $add データの追加も行う場合 true
     * @return bool データが存在する場合 true, データの追加に成功した場合 true,
     *               $add == false で, データが存在しない場合 false
     */
    function sfDataExists($table_name, $where, $arrval, $dsn = "", $sql = "", $add = false) {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();
        $dsn = $dbFactory->getDSN($dsn);

        $objQuery = new SC_Query($dsn, true, true);
        $count = $objQuery->count($table_name, $where, $arrval);

        if($count > 0) {
            $ret = true;
        } else {
            $ret = false;
        }
        // データを追加する
        if(!$ret && $add) {
            $objQuery->exec($sql);
        }
        return $ret;
    }

    /**
     * 店舗基本情報を取得する.
     *
     * @param boolean $force 強制的にDB取得するか
     * @return array 店舗基本情報の配列
     */
    function sf_getBasisData($force = false) {
        static $data;
        
        if ($force || !isset($data)) {
            $objQuery = new SC_Query();
            $arrRet = $objQuery->select('*', 'dtb_baseinfo');
            
            if (isset($arrRet[0])) {
                $data = $arrRet[0];
            } else {
                $data = array();
            }
        }
        
        return $data;
    }

    /* 選択中のアイテムのルートカテゴリIDを取得する */
    function sfGetRootId() {

        if(!$this->g_root_on)   {
            $this->g_root_on = true;
            $objQuery = new SC_Query();

            if (!isset($_GET['product_id'])) $_GET['product_id'] = "";
            if (!isset($_GET['category_id'])) $_GET['category_id'] = "";

            if(!empty($_GET['product_id']) || !empty($_GET['category_id'])) {
                // 選択中のカテゴリIDを判定する
                $category_id = $this->sfGetCategoryId($_GET['product_id'], $_GET['category_id']);
                // ROOTカテゴリIDの取得
                $arrRet = $this->sfGetParents($objQuery, 'dtb_category', 'parent_category_id', 'category_id', $category_id);
                $root_id = isset($arrRet[0]) ? $arrRet[0] : "";
            } else {
                // ROOTカテゴリIDをなしに設定する
                $root_id = "";
            }
            $this->g_root_id = $root_id;
        }
        return $this->g_root_id;
    }

    /**
     * 商品規格情報を取得する.
     *
     * @param array $arrID 規格ID
     * @return array 規格情報の配列
     */
    function sfGetProductsClass($arrID) {
        list($product_id, $classcategory_id1, $classcategory_id2) = $arrID;

        if($classcategory_id1 == "") {
            $classcategory_id1 = '0';
        }
        if($classcategory_id2 == "") {
            $classcategory_id2 = '0';
        }

        // 商品規格取得
        $objQuery = new SC_Query();
        $col = "product_id, deliv_fee, name, product_code, main_list_image, main_image, price01, price02, point_rate, product_class_id, classcategory_id1, classcategory_id2, class_id1, class_id2, stock, stock_unlimited, sale_limit";
        $table = "vw_product_class AS prdcls";
        $where = "product_id = ? AND classcategory_id1 = ? AND classcategory_id2 = ? AND status = 1";
        $arrRet = $objQuery->select($col, $table, $where, array($product_id, $classcategory_id1, $classcategory_id2));
        return $arrRet[0];
    }

    /**
     * 支払い方法を取得する.
     *
     * @return void
     */
    function sfGetPayment() {
        $objQuery = new SC_Query();
        // 購入金額が条件額以下の項目を取得
        $where = "del_flg = 0";
        $objQuery->setorder("fix, rank DESC");
        $arrRet = $objQuery->select("payment_id, payment_method, rule", "dtb_payment", $where);
        return $arrRet;
    }

    /**
     * カート内商品の集計処理を行う.
     *
     * @param LC_Page $objPage ページクラスのインスタンス
     * @param SC_CartSession $objCartSess カートセッションのインスタンス
     * @return LC_Page 集計処理後のページクラスインスタンス
     */
    function sfTotalCart(&$objPage, $objCartSess) {

        // 規格名一覧
        $arrClassName = $this->sfGetIDValueList("dtb_class", "class_id", "name");
        // 規格分類名一覧
        $arrClassCatName = $this->sfGetIDValueList("dtb_classcategory", "classcategory_id", "name");

        $objPage->tpl_total_pretax = 0;     // 費用合計(税込み)
        $objPage->tpl_total_tax = 0;        // 消費税合計
        $objPage->tpl_total_point = 0;      // ポイント合計

        // カート内情報の取得
        $arrQuantityInfo_by_product = array();
        $cnt = 0;
        foreach ($objCartSess->getCartList() as $arrCart) {
            // 商品規格情報の取得
            $arrData = $this->sfGetProductsClass($arrCart['id']);
            $limit = null;
            // DBに存在する商品
            if (count($arrData) > 0) {

                // 購入制限数を求める。
                if ($arrData['stock_unlimited'] != '1' && SC_Utils_Ex::sfIsInt($arrData['sale_limit'])) {
                    $limit = min($arrData['sale_limit'], $arrData['stock']);
                } elseif (SC_Utils_Ex::sfIsInt($arrData['sale_limit'])) {
                    $limit = $arrData['sale_limit'];
                } elseif ($arrData['stock_unlimited'] != '1') {
                    $limit = $arrData['stock'];
                }

                if (!is_null($limit) && $arrCart['quantity'] > $limit) {
                    if ($limit > 0) {
                        // カート内商品数を制限に合わせる
                        $objCartSess->setProductValue($arrCart['id'], 'quantity', $limit);
                        $quantity = $limit;
                        $objPage->tpl_message .= "※「" . $arrData['name'] . "」は販売制限(または在庫が不足)しております。一度に数量{$limit}以上の購入はできません。\n";
                    } else {
                        // 売り切れ商品をカートから削除する
                        $objCartSess->delProduct($arrCart['cart_no']);
                        $objPage->tpl_message .= "※「" . $arrData['name'] . "」は売り切れました。\n";
                        break;
                    }
                } else {
                    $quantity = $arrCart['quantity'];
                }
                
                // (商品規格単位でなく)商品単位での評価のための準備
                $product_id = $arrCart['id'][0];
                $arrQuantityInfo_by_product[$product_id]['quantity'] += $quantity;
                $arrQuantityInfo_by_product[$product_id]['sale_limit'] = $arrData['sale_limit'];
                $arrQuantityInfo_by_product[$product_id]['name'] = $arrData['name'];
                
                $objPage->arrProductsClass[$cnt] = $arrData;
                $objPage->arrProductsClass[$cnt]['quantity'] = $quantity;
                $objPage->arrProductsClass[$cnt]['cart_no'] = $arrCart['cart_no'];
                $objPage->arrProductsClass[$cnt]['class_name1'] =
                    isset($arrClassName[$arrData['class_id1']])
                        ? $arrClassName[$arrData['class_id1']] : "";

                $objPage->arrProductsClass[$cnt]['class_name2'] =
                    isset($arrClassName[$arrData['class_id2']])
                        ? $arrClassName[$arrData['class_id2']] : "";

                $objPage->arrProductsClass[$cnt]['classcategory_name1'] =
                    $arrClassCatName[$arrData['classcategory_id1']];

                $objPage->arrProductsClass[$cnt]['classcategory_name2'] =
                    $arrClassCatName[$arrData['classcategory_id2']];

                // 画像サイズ
                $main_image_path = IMAGE_SAVE_DIR . basename($objPage->arrProductsClass[$cnt]["main_image"]);
                if(file_exists($main_image_path)) {
                    list($image_width, $image_height) = getimagesize($main_image_path);
                } else {
                    $image_width = 0;
                    $image_height = 0;
                }

                $objPage->arrProductsClass[$cnt]["tpl_image_width"] = $image_width + 60;
                $objPage->arrProductsClass[$cnt]["tpl_image_height"] = $image_height + 80;
                // 価格の登録
                if ($arrData['price02'] != "") {
                    $objCartSess->setProductValue($arrCart['id'], 'price', $arrData['price02']);
                    $objPage->arrProductsClass[$cnt]['uniq_price'] = $arrData['price02'];
                } else {
                    $objCartSess->setProductValue($arrCart['id'], 'price', $arrData['price01']);
                    $objPage->arrProductsClass[$cnt]['uniq_price'] = $arrData['price01'];
                }
                // ポイント付与率の登録
                if (USE_POINT !== false) {
                    $objCartSess->setProductValue($arrCart['id'], 'point_rate', $arrData['point_rate']);
                }
                // 商品ごとの合計金額
                $objPage->arrProductsClass[$cnt]['total_pretax'] = $objCartSess->getProductTotal($arrCart['id']);
                // 送料の合計を計算する
                $objPage->tpl_total_deliv_fee+= ($arrData['deliv_fee'] * $arrCart['quantity']);
                $cnt++;
            } else { // DBに商品が見つからない場合、
                $objPage->tpl_message .= "※ 現時点で販売していない商品が含まれておりました。該当商品をカートから削除しました。\n";
                // カート商品の削除
                $objCartSess->delProduct($arrCart['cart_no']);
            }
        }
        
        foreach ($arrQuantityInfo_by_product as $product_id => $quantityInfo) {
            if (SC_Utils_Ex::sfIsInt($quantityInfo['sale_limit']) && $quantityInfo['quantity'] > $quantityInfo['sale_limit']) {
                $objPage->tpl_error = "※「{$quantityInfo['name']}」は数量「{$quantityInfo['sale_limit']}」以下に販売制限しております。一度にこれ以上の購入はできません。\n";
                // 販売制限に引っかかった商品をマークする
                foreach (array_keys($objPage->arrProductsClass) as $key) {
                    $ProductsClass =& $objPage->arrProductsClass[$key];
                    if ($ProductsClass['product_id'] == $product_id) {
                        $ProductsClass['error'] = true;
                    }
                }
            }
        }
        
        // 全商品合計金額(税込み)
        $objPage->tpl_total_pretax = $objCartSess->getAllProductsTotal();
        // 全商品合計消費税
        $objPage->tpl_total_tax = $objCartSess->getAllProductsTax();
        // 全商品合計ポイント
        if (USE_POINT !== false) {
            $objPage->tpl_total_point = $objCartSess->getAllProductsPoint();
        }

        return $objPage;
    }

    /**
     * 受注一時テーブルへの書き込み処理を行う.
     *
     * @param string $uniqid ユニークID
     * @param array $sqlval SQLの値の配列
     * @return void
     */
    function sfRegistTempOrder($uniqid, $sqlval) {
        if($uniqid != "") {
            // 既存データのチェック
            $objQuery = new SC_Query();
            $where = "order_temp_id = ?";
            $cnt = $objQuery->count("dtb_order_temp", $where, array($uniqid));
            // 既存データがない場合
            if ($cnt == 0) {
                // 初回書き込み時に会員の登録済み情報を取り込む
                $sqlval = $this->sfGetCustomerSqlVal($uniqid, $sqlval);
                $sqlval['create_date'] = "now()";
                $objQuery->insert("dtb_order_temp", $sqlval);
            } else {
                $objQuery->update("dtb_order_temp", $sqlval, $where, array($uniqid));
            }
            
            // 受注_Tempテーブルの名称列を更新
            $this->sfUpdateOrderNameCol($uniqid, true);
        }
    }

    /**
     * 会員情報から SQL文の値を生成する.
     *
     * @param string $uniqid ユニークID
     * @param array $sqlval SQL の値の配列
     * @return array 会員情報を含んだ SQL の値の配列
     */
    function sfGetCustomerSqlVal($uniqid, $sqlval) {
        $objCustomer = new SC_Customer();
        // 会員情報登録処理
        if ($objCustomer->isLoginSuccess(true)) {
            // 登録データの作成
            $sqlval['order_temp_id'] = $uniqid;
            $sqlval['update_date'] = 'Now()';
            $sqlval['customer_id'] = $objCustomer->getValue('customer_id');
            $sqlval['order_name01'] = $objCustomer->getValue('name01');
            $sqlval['order_name02'] = $objCustomer->getValue('name02');
            $sqlval['order_kana01'] = $objCustomer->getValue('kana01');
            $sqlval['order_kana02'] = $objCustomer->getValue('kana02');
            $sqlval['order_sex'] = $objCustomer->getValue('sex');
            $sqlval['order_zip01'] = $objCustomer->getValue('zip01');
            $sqlval['order_zip02'] = $objCustomer->getValue('zip02');
            $sqlval['order_pref'] = $objCustomer->getValue('pref');
            $sqlval['order_addr01'] = $objCustomer->getValue('addr01');
            $sqlval['order_addr02'] = $objCustomer->getValue('addr02');
            $sqlval['order_tel01'] = $objCustomer->getValue('tel01');
            $sqlval['order_tel02'] = $objCustomer->getValue('tel02');
            $sqlval['order_tel03'] = $objCustomer->getValue('tel03');
            if (defined('MOBILE_SITE')) {
                $email_mobile = $objCustomer->getValue('email_mobile');
                if (empty($email_mobile)) {
                    $sqlval['order_email'] = $objCustomer->getValue('email');
                } else {
                    $sqlval['order_email'] = $email_mobile;
                }
            } else {
                $sqlval['order_email'] = $objCustomer->getValue('email');
            }
            $sqlval['order_job'] = $objCustomer->getValue('job');
            $sqlval['order_birth'] = $objCustomer->getValue('birth');
        }
        return $sqlval;
    }

    /**
     * 会員編集登録処理を行う.
     *
     * @param array $array パラメータの配列
     * @param array $arrRegistColumn 登録するカラムの配列
     * @return void
     */
    function sfEditCustomerData($array, $arrRegistColumn) {
        $objQuery = new SC_Query();

        foreach ($arrRegistColumn as $data) {
            if ($data["column"] != "password") {
                if($array[ $data['column'] ] != "") {
                    $arrRegist[ $data["column"] ] = $array[ $data["column"] ];
                } else {
                    $arrRegist[ $data['column'] ] = NULL;
                }
            }
        }
        if (strlen($array["year"]) > 0 && strlen($array["month"]) > 0 && strlen($array["day"]) > 0) {
            $arrRegist["birth"] = $array["year"] ."/". $array["month"] ."/". $array["day"] ." 00:00:00";
        } else {
            $arrRegist["birth"] = NULL;
        }

        //-- パスワードの更新がある場合は暗号化。（更新がない場合はUPDATE文を構成しない）
        if ($array["password"] != DEFAULT_PASSWORD) $arrRegist["password"] = sha1($array["password"] . ":" . AUTH_MAGIC);
        $arrRegist["update_date"] = "NOW()";

        //-- 編集登録実行
        $objQuery->update("dtb_customer", $arrRegist, "customer_id = ? ", array($array['customer_id']));
    }

    /**
     * 注文番号、利用ポイント、加算ポイントから最終ポイントを取得する.
     *
     * @param integer $order_id 注文番号
     * @param integer $use_point 利用ポイント
     * @param integer $add_point 加算ポイント
     * @return array 最終ポイントの配列
     */
    function sfGetCustomerPoint($order_id, $use_point, $add_point) {
        $objQuery = new SC_Query();
        $arrRet = $objQuery->select("customer_id", "dtb_order", "order_id = ?", array($order_id));
        $customer_id = $arrRet[0]['customer_id'];
        if ($customer_id != "" && $customer_id >= 1) {
            if (USE_POINT !== false) {
                $arrRet = $objQuery->select("point", "dtb_customer", "customer_id = ?", array($customer_id));
                $point = $arrRet[0]['point'];
                $total_point = $arrRet[0]['point'] - $use_point + $add_point;
            } else {
                $total_point = 0;
                $point = 0;
            }
        } else {
            $total_point = "";
            $point = "";
        }
        return array($point, $total_point);
    }

    /**
     * 顧客番号、利用ポイント、加算ポイントから最終ポイントを取得する.
     *
     * @param integer $customer_id 顧客番号
     * @param integer $use_point 利用ポイント
     * @param integer $add_point 加算ポイント
     * @return array 最終ポイントの配列
     */
    function sfGetCustomerPointFromCid($customer_id, $use_point, $add_point) {
        $objQuery = new SC_Query();
        if (USE_POINT !== false) {
            $arrRet = $objQuery->select("point", "dtb_customer", "customer_id = ?", array($customer_id));
            $point = $arrRet[0]['point'];
            $total_point = $arrRet[0]['point'] - $use_point + $add_point;
        } else {
            $total_point = 0;
            $point = 0;
        }
        return array($point, $total_point);
    }
    /**
     * カテゴリツリーの取得を行う.
     *
     * @param integer $parent_category_id 親カテゴリID
     * @param bool $count_check 登録商品数のチェックを行う場合 true
     * @return array カテゴリツリーの配列
     */
    function sfGetCatTree($parent_category_id, $count_check = false) {
        $objQuery = new SC_Query();
        $col = "";
        $col .= " cat.category_id,";
        $col .= " cat.category_name,";
        $col .= " cat.parent_category_id,";
        $col .= " cat.level,";
        $col .= " cat.rank,";
        $col .= " cat.creator_id,";
        $col .= " cat.create_date,";
        $col .= " cat.update_date,";
        $col .= " cat.del_flg, ";
        $col .= " ttl.product_count";
        $from = "dtb_category as cat left join dtb_category_total_count as ttl on ttl.category_id = cat.category_id";
        // 登録商品数のチェック
        if($count_check) {
            $where = "del_flg = 0 AND product_count > 0";
        } else {
            $where = "del_flg = 0";
        }
        $objQuery->setoption("ORDER BY rank DESC");
        $arrRet = $objQuery->select($col, $from, $where);

        $arrParentID = $this->sfGetParents($objQuery, 'dtb_category', 'parent_category_id', 'category_id', $parent_category_id);

        foreach($arrRet as $key => $array) {
            foreach($arrParentID as $val) {
                if($array['category_id'] == $val) {
                    $arrRet[$key]['display'] = 1;
                    break;
                }
            }
        }

        return $arrRet;
    }

    /**
     * カテゴリツリーの取得を複数カテゴリーで行う.
     *
     * @param integer $product_id 商品ID
     * @param bool $count_check 登録商品数のチェックを行う場合 true
     * @return array カテゴリツリーの配列
     */
    function sfGetMultiCatTree($product_id, $count_check = false) {
        $objQuery = new SC_Query();
        $col = "";
        $col .= " cat.category_id,";
        $col .= " cat.category_name,";
        $col .= " cat.parent_category_id,";
        $col .= " cat.level,";
        $col .= " cat.rank,";
        $col .= " cat.creator_id,";
        $col .= " cat.create_date,";
        $col .= " cat.update_date,";
        $col .= " cat.del_flg, ";
        $col .= " ttl.product_count";
        $from = "dtb_category as cat left join dtb_category_total_count as ttl on ttl.category_id = cat.category_id";
        // 登録商品数のチェック
        if($count_check) {
            $where = "del_flg = 0 AND product_count > 0";
        } else {
            $where = "del_flg = 0";
        }
        $objQuery->setoption("ORDER BY rank DESC");
        $arrRet = $objQuery->select($col, $from, $where);

        $arrCategory_id = $this->sfGetCategoryId($product_id);

        $arrCatTree = array();
        foreach ($arrCategory_id as $pkey => $parent_category_id) {
            $arrParentID = $this->sfGetParents($objQuery, 'dtb_category', 'parent_category_id', 'category_id', $parent_category_id);

            foreach($arrParentID as $pid) {
                foreach($arrRet as $key => $array) {
                    if($array['category_id'] == $pid) {
                        $arrCatTree[$pkey][] = $arrRet[$key];
                        break;
                    }
                }
            }
        }

        return $arrCatTree;
    }

    /**
     * 親カテゴリーを連結した文字列を取得する.
     *
     * @param integer $category_id カテゴリID
     * @return string 親カテゴリーを連結した文字列
     */
    function sfGetCatCombName($category_id){
        // 商品が属するカテゴリIDを縦に取得
        $objQuery = new SC_Query();
        $arrCatID = $this->sfGetParents($objQuery, "dtb_category", "parent_category_id", "category_id", $category_id);
        $ConbName = "";

        // カテゴリー名称を取得する
        foreach($arrCatID as $key => $val){
            $sql = "SELECT category_name FROM dtb_category WHERE category_id = ?";
            $arrVal = array($val);
            $CatName = $objQuery->getOne($sql,$arrVal);
            $ConbName .= $CatName . ' | ';
        }
        // 最後の ｜ をカットする
        $ConbName = substr_replace($ConbName, "", strlen($ConbName) - 2, 2);

        return $ConbName;
    }

    /**
     * 指定したカテゴリーIDのカテゴリーを取得する.
     *
     * @param integer $category_id カテゴリID
     * @return array 指定したカテゴリーIDのカテゴリー
     */
    function sfGetCat($category_id){
        $objQuery = new SC_Query();

        // カテゴリーを取得する
        $arrVal = array($category_id);
        $res = $objQuery->select('category_id AS id, category_name AS name', 'dtb_category', 'category_id = ?', $arrVal);

        return $res[0];
    }

    /**
     * 指定したカテゴリーIDの大カテゴリーを取得する.
     *
     * @param integer $category_id カテゴリID
     * @return array 指定したカテゴリーIDの大カテゴリー
     */
    function sfGetFirstCat($category_id){
        // 商品が属するカテゴリIDを縦に取得
        $objQuery = new SC_Query();
        $arrRet = array();
        $arrCatID = $this->sfGetParents($objQuery, "dtb_category", "parent_category_id", "category_id", $category_id);
        $arrRet['id'] = $arrCatID[0];

        // カテゴリー名称を取得する
        $sql = "SELECT category_name FROM dtb_category WHERE category_id = ?";
        $arrVal = array($arrRet['id']);
        $arrRet['name'] = $objQuery->getOne($sql,$arrVal);

        return $arrRet;
    }

    /**
     * カテゴリツリーの取得を行う.
     *
     * $products_check:true商品登録済みのものだけ取得する
     *
     * @param string $addwhere 追加する WHERE 句
     * @param bool $products_check 商品の存在するカテゴリのみ取得する場合 true
     * @param string $head カテゴリ名のプレフィックス文字列
     * @return array カテゴリツリーの配列
     */
    function sfGetCategoryList($addwhere = "", $products_check = false, $head = CATEGORY_HEAD) {
        $objQuery = new SC_Query();
        $where = "del_flg = 0";

        if($addwhere != "") {
            $where.= " AND $addwhere";
        }

        $objQuery->setoption("ORDER BY rank DESC");

        if($products_check) {
            $col = "T1.category_id, category_name, level";
            $from = "dtb_category AS T1 LEFT JOIN dtb_category_total_count AS T2 ON T1.category_id = T2.category_id";
            $where .= " AND product_count > 0";
        } else {
            $col = "category_id, category_name, level";
            $from = "dtb_category";
        }

        $arrRet = $objQuery->select($col, $from, $where);

        $max = count($arrRet);
        for($cnt = 0; $cnt < $max; $cnt++) {
            $id = $arrRet[$cnt]['category_id'];
            $name = $arrRet[$cnt]['category_name'];
            $arrList[$id] = str_repeat($head, $arrRet[$cnt]['level']) . $name;
        }
        return $arrList;
    }

    /**
     * カテゴリーツリーの取得を行う.
     *
     * 親カテゴリの Value=0 を対象とする
     *
     * @param bool $parent_zero 親カテゴリの Value=0 の場合 true
     * @return array カテゴリツリーの配列
     */
    function sfGetLevelCatList($parent_zero = true) {
        $objQuery = new SC_Query();

        // カテゴリ名リストを取得
        $col = "category_id, parent_category_id, category_name";
        $where = "del_flg = 0";
        $objQuery->setoption("ORDER BY level");
        $arrRet = $objQuery->select($col, "dtb_category", $where);
        $arrCatName = array();
        foreach ($arrRet as $arrTmp) {
            $arrCatName[$arrTmp['category_id']] =
                (($arrTmp['parent_category_id'] > 0)?
                    $arrCatName[$arrTmp['parent_category_id']] : "")
                . CATEGORY_HEAD . $arrTmp['category_name'];
        }

        $col = "category_id, parent_category_id, category_name, level";
        $where = "del_flg = 0";
        $objQuery->setoption("ORDER BY rank DESC");
        $arrRet = $objQuery->select($col, "dtb_category", $where);
        $max = count($arrRet);

        for($cnt = 0; $cnt < $max; $cnt++) {
            if($parent_zero) {
                if($arrRet[$cnt]['level'] == LEVEL_MAX) {
                    $arrValue[$cnt] = $arrRet[$cnt]['category_id'];
                } else {
                    $arrValue[$cnt] = "";
                }
            } else {
                $arrValue[$cnt] = $arrRet[$cnt]['category_id'];
            }

            $arrOutput[$cnt] = $arrCatName[$arrRet[$cnt]['category_id']];
        }

        return array($arrValue, $arrOutput);
    }

    /**
     * 選択中の商品のカテゴリを取得する.
     *
     * @param integer $product_id プロダクトID
     * @param integer $category_id カテゴリID
     * @return array 選択中の商品のカテゴリIDの配列
     *
     */
    function sfGetCategoryId($product_id, $category_id = 0, $closed = false) {
        if ($closed) {
            $status = "";
        } else {
            $status = "status = 1";
        }

        if(!$this->g_category_on) {
            $this->g_category_on = true;
            $category_id = (int) $category_id;
            $product_id = (int) $product_id;
            if (SC_Utils_Ex::sfIsInt($category_id) && $category_id != 0 && $this->sfIsRecord("dtb_category","category_id", $category_id)) {
                $this->g_category_id = array($category_id);
            } else if (SC_Utils_Ex::sfIsInt($product_id) && $product_id != 0 && $this->sfIsRecord("dtb_products","product_id", $product_id, $status)) {
                $objQuery = new SC_Query();
                $where = "product_id = ?";
                $category_id = $objQuery->getCol("dtb_product_categories", "category_id", "product_id = ?", array($product_id));
                $this->g_category_id = $category_id;
            } else {
                // 不正な場合は、空の配列を返す。
                $this->g_category_id = array();
            }
        }
        return $this->g_category_id;
    }

    /**
     * 商品をカテゴリの先頭に追加する.
     *
     * @param integer $category_id カテゴリID
     * @param integer $product_id プロダクトID
     * @return void
     */
    function addProductBeforCategories($category_id, $product_id) {

        $sqlval = array("category_id" => $category_id,
                        "product_id" => $product_id);

        $objQuery = new SC_Query();

        // 現在の商品カテゴリを取得
        $arrCat = $objQuery->select("product_id, category_id, rank",
                                    "dtb_product_categories",
                                    "category_id = ?",
                                    array($category_id));

        $max = "0";
        foreach ($arrCat as $val) {
            // 同一商品が存在する場合は登録しない
            if ($val["product_id"] == $product_id) {
                return;
            }
            // 最上位ランクを取得
            $max = ($max < $val["rank"]) ? $val["rank"] : $max;
        }
        $sqlval["rank"] = $max + 1;
        $objQuery->insert("dtb_product_categories", $sqlval);
    }

    /**
     * 商品をカテゴリの末尾に追加する.
     *
     * @param integer $category_id カテゴリID
     * @param integer $product_id プロダクトID
     * @return void
     */
    function addProductAfterCategories($category_id, $product_id) {
        $sqlval = array("category_id" => $category_id,
                        "product_id" => $product_id);

        $objQuery = new SC_Query();

        // 現在の商品カテゴリを取得
        $arrCat = $objQuery->select("product_id, category_id, rank",
                                    "dtb_product_categories",
                                    "category_id = ?",
                                    array($category_id));

        $min = 0;
        foreach ($arrCat as $val) {
            // 同一商品が存在する場合は登録しない
            if ($val["product_id"] == $product_id) {
                return;
            }
            // 最下位ランクを取得
            $min = ($min < $val["rank"]) ? $val["rank"] : $min;
        }
        $sqlval["rank"] = $min;
        $objQuery->insert("dtb_product_categories", $sqlval);
    }

    /**
     * 商品をカテゴリから削除する.
     *
     * @param integer $category_id カテゴリID
     * @param integer $product_id プロダクトID
     * @return void
     */
    function removeProductByCategories($category_id, $product_id) {
        $sqlval = array("category_id" => $category_id,
                        "product_id" => $product_id);
        $objQuery = new SC_Query();
        $objQuery->delete("dtb_product_categories",
                          "category_id = ? AND product_id = ?", $sqlval);
    }

    /**
     * 商品カテゴリを更新する.
     *
     * @param array $arrCategory_id 登録するカテゴリIDの配列
     * @param integer $product_id プロダクトID
     * @return void
     */
    function updateProductCategories($arrCategory_id, $product_id) {
        $objQuery = new SC_Query();

        // 現在のカテゴリ情報を取得
        $arrCurrentCat = $objQuery->select("product_id, category_id, rank",
                                           "dtb_product_categories",
                                           "product_id = ?",
                                           array($product_id));

        // 登録するカテゴリ情報と比較
        foreach ($arrCurrentCat as $val) {

            // 登録しないカテゴリを削除
            if (!in_array($val["category_id"], $arrCategory_id)) {
                $this->removeProductByCategories($val["category_id"], $product_id);
            }
        }

        // カテゴリを登録
        foreach ($arrCategory_id as $category_id) {
            $this->addProductBeforCategories($category_id, $product_id);
        }
    }

    /**
     * カテゴリ数の登録を行う.
     *
     * @param SC_Query $objQuery SC_Query インスタンス
     * @return void
     */
    function sfCategory_Count($objQuery){

        //テーブル内容の削除
        $objQuery->query("DELETE FROM dtb_category_count");
        $objQuery->query("DELETE FROM dtb_category_total_count");

        $sql_where .= 'alldtl.del_flg = 0 AND alldtl.status = 1';
        // 在庫無し商品の非表示
        if (NOSTOCK_HIDDEN === true) {
            $sql_where .= ' AND (alldtl.stock_max >= 1 OR alldtl.stock_unlimited_max = 1)';
        }

        //各カテゴリ内の商品数を数えて格納
        $sql = <<< __EOS__
            INSERT INTO dtb_category_count(category_id, product_count, create_date)
            SELECT T1.category_id, count(T2.category_id), now()
            FROM dtb_category AS T1
                LEFT JOIN dtb_product_categories AS T2
                    ON T1.category_id = T2.category_id
                LEFT JOIN vw_products_allclass_detail AS alldtl
                    ON T2.product_id = alldtl.product_id
            WHERE $sql_where
            GROUP BY T1.category_id, T2.category_id
__EOS__;
        
        $objQuery->query($sql);

        //子カテゴリ内の商品数を集計する
        
        // カテゴリ情報を取得
        $arrCat = $objQuery->select('category_id', 'dtb_category');
        
        foreach ($arrCat as $row) {
            $category_id = $row['category_id'];
            $arrval = array();
            
            $arrval[] = $category_id;
            
            list($tmp_where, $tmp_arrval) = $this->sfGetCatWhere($category_id);
            if ($tmp_where != "") {
                $sql_where_product_ids = "alldtl.product_id IN (SELECT product_id FROM dtb_product_categories WHERE " . $tmp_where . ")";
                $arrval = array_merge((array)$arrval, (array)$tmp_arrval);
            } else {
                $sql_where_product_ids = '0<>0'; // 一致させない
            }
            
            $sql = <<< __EOS__
                INSERT INTO dtb_category_total_count (category_id, product_count, create_date)
                SELECT
                    ?
                    ,count(*)
                    ,now()
                FROM vw_products_allclass_detail AS alldtl
                WHERE ($sql_where) AND ($sql_where_product_ids)
__EOS__;
            
            $objQuery->query($sql, $arrval);
        }
    }

    /**
     * 子IDの配列を返す.
     *
     * @param string $table テーブル名
     * @param string $pid_name 親ID名
     * @param string $id_name ID名
     * @param integer $id ID
     * @param array 子ID の配列
     */
    function sfGetChildsID($table, $pid_name, $id_name, $id) {
        $arrRet = $this->sfGetChildrenArray($table, $pid_name, $id_name, $id);
        return $arrRet;
    }

    /**
     * 階層構造のテーブルから子ID配列を取得する.
     *
     * @param string $table テーブル名
     * @param string $pid_name 親ID名
     * @param string $id_name ID名
     * @param integer $id ID番号
     * @return array 子IDの配列
     */
    function sfGetChildrenArray($table, $pid_name, $id_name, $id) {
        $objQuery = new SC_Query();
        $col = $pid_name . "," . $id_name;
         $arrData = $objQuery->select($col, $table);

        $arrPID = array();
        $arrPID[] = $id;
        $arrChildren = array();
        $arrChildren[] = $id;

        $arrRet = $this->sfGetChildrenArraySub($arrData, $pid_name, $id_name, $arrPID);

        while(count($arrRet) > 0) {
            $arrChildren = array_merge($arrChildren, $arrRet);
            $arrRet = $this->sfGetChildrenArraySub($arrData, $pid_name, $id_name, $arrRet);
        }

        return $arrChildren;
    }

    /**
     * 親ID直下の子IDをすべて取得する.
     *
     * @param array $arrData 親カテゴリの配列
     * @param string $pid_name 親ID名
     * @param string $id_name ID名
     * @param array $arrPID 親IDの配列
     * @return array 子IDの配列
     */
    function sfGetChildrenArraySub($arrData, $pid_name, $id_name, $arrPID) {
        $arrChildren = array();
        $max = count($arrData);

        for($i = 0; $i < $max; $i++) {
            foreach($arrPID as $val) {
                if($arrData[$i][$pid_name] == $val) {
                    $arrChildren[] = $arrData[$i][$id_name];
                }
            }
        }
        return $arrChildren;
    }

    /**
     * 所属するすべての階層の親IDを配列で返す.
     *
     * @param SC_Query $objQuery SC_Query インスタンス
     * @param string $table テーブル名
     * @param string $pid_name 親ID名
     * @param string $id_name ID名
     * @param integer $id ID
     * @return array 親IDの配列
     */
    function sfGetParents($objQuery, $table, $pid_name, $id_name, $id) {
        $arrRet = $this->sfGetParentsArray($table, $pid_name, $id_name, $id);
        // 配列の先頭1つを削除する。
        array_shift($arrRet);
        return $arrRet;
    }

    /**
     * 階層構造のテーブルから親ID配列を取得する.
     *
     * @param string $table テーブル名
     * @param string $pid_name 親ID名
     * @param string $id_name ID名
     * @param integer $id ID
     * @return array 親IDの配列
     */
    function sfGetParentsArray($table, $pid_name, $id_name, $id) {
        $objQuery = new SC_Query();
        $col = $pid_name . "," . $id_name;
        $arrData = $objQuery->select($col, $table);

        $arrParents = array();
        $arrParents[] = $id;
        $child = $id;

        $ret = SC_Utils::sfGetParentsArraySub($arrData, $pid_name, $id_name, $child);

        while($ret != "") {
            $arrParents[] = $ret;
            $ret = SC_Utils::sfGetParentsArraySub($arrData, $pid_name, $id_name, $ret);
        }

        $arrParents = array_reverse($arrParents);

        return $arrParents;
    }

    /**
     * カテゴリから商品を検索する場合のWHERE文と値を返す.
     *
     * @param integer $category_id カテゴリID
     * @return array 商品を検索する場合の配列
     */
    function sfGetCatWhere($category_id) {
        // 子カテゴリIDの取得
        $arrRet = $this->sfGetChildsID("dtb_category", "parent_category_id", "category_id", $category_id);
        $tmp_where = "";
        foreach ($arrRet as $val) {
            if($tmp_where == "") {
                $tmp_where.= "category_id IN ( ?";
            } else {
                $tmp_where.= ",? ";
            }
            $arrval[] = $val;
        }
        $tmp_where.= " ) ";
        return array($tmp_where, $arrval);
    }

    /**
     * 受注一時テーブルから情報を取得する.
     *
     * @param integer $order_temp_id 受注一時ID
     * @return array 受注一時情報の配列
     */
    function sfGetOrderTemp($order_temp_id) {
        $objQuery = new SC_Query();
        $where = "order_temp_id = ?";
        $arrRet = $objQuery->select("*", "dtb_order_temp", $where, array($order_temp_id));
        return $arrRet[0];
    }

    /**
     * SELECTボックス用リストを作成する.
     *
     * @param string $table テーブル名
     * @param string $keyname プライマリーキーのカラム名
     * @param string $valname データ内容のカラム名
     * @return array SELECT ボックス用リストの配列
     */
    function sfGetIDValueList($table, $keyname, $valname) {
        $objQuery = new SC_Query();
        $col = "$keyname, $valname";
        $objQuery->setwhere("del_flg = 0");
        $objQuery->setorder("rank DESC");
        $arrList = $objQuery->select($col, $table);
        $count = count($arrList);
        for($cnt = 0; $cnt < $count; $cnt++) {
            $key = $arrList[$cnt][$keyname];
            $val = $arrList[$cnt][$valname];
            $arrRet[$key] = $val;
        }
        return $arrRet;
    }

    /**
     * ランキングを上げる.
     *
     * @param string $table テーブル名
     * @param string $colname カラム名
     * @param string|integer $id テーブルのキー
     * @param string $andwhere SQL の AND 条件である WHERE 句
     * @return void
     */
    function sfRankUp($table, $colname, $id, $andwhere = "") {
        $objQuery = new SC_Query();
        $objQuery->begin();
        $where = "$colname = ?";
        if($andwhere != "") {
            $where.= " AND $andwhere";
        }
        // 対象項目のランクを取得
        $rank = $objQuery->get($table, "rank", $where, array($id));
        // ランクの最大値を取得
        $maxrank = $objQuery->max($table, "rank", $andwhere);
        // ランクが最大値よりも小さい場合に実行する。
        if($rank < $maxrank) {
            // ランクが一つ上のIDを取得する。
            $where = "rank = ?";
            if($andwhere != "") {
                $where.= " AND $andwhere";
            }
            $uprank = $rank + 1;
            $up_id = $objQuery->get($table, $colname, $where, array($uprank));
            // ランク入れ替えの実行
            $sqlup = "UPDATE $table SET rank = ? WHERE $colname = ?";
            if($andwhere != "") {
                $sqlup.= " AND $andwhere";
            }
            $objQuery->exec($sqlup, array($rank + 1, $id));
            $objQuery->exec($sqlup, array($rank, $up_id));
        }
        $objQuery->commit();
    }

    /**
     * ランキングを下げる.
     *
     * @param string $table テーブル名
     * @param string $colname カラム名
     * @param string|integer $id テーブルのキー
     * @param string $andwhere SQL の AND 条件である WHERE 句
     * @return void
     */
    function sfRankDown($table, $colname, $id, $andwhere = "") {
        $objQuery = new SC_Query();
        $objQuery->begin();
        $where = "$colname = ?";
        if($andwhere != "") {
            $where.= " AND $andwhere";
        }
        // 対象項目のランクを取得
        $rank = $objQuery->get($table, "rank", $where, array($id));

        // ランクが1(最小値)よりも大きい場合に実行する。
        if($rank > 1) {
            // ランクが一つ下のIDを取得する。
            $where = "rank = ?";
            if($andwhere != "") {
                $where.= " AND $andwhere";
            }
            $downrank = $rank - 1;
            $down_id = $objQuery->get($table, $colname, $where, array($downrank));
            // ランク入れ替えの実行
            $sqlup = "UPDATE $table SET rank = ? WHERE $colname = ?";
            if($andwhere != "") {
                $sqlup.= " AND $andwhere";
            }
            $objQuery->exec($sqlup, array($rank - 1, $id));
            $objQuery->exec($sqlup, array($rank, $down_id));
        }
        $objQuery->commit();
    }

    /**
     * 指定順位へ移動する.
     *
     * @param string $tableName テーブル名
     * @param string $keyIdColumn キーを保持するカラム名
     * @param string|integer $keyId キーの値
     * @param integer $pos 指定順位
     * @param string $where SQL の AND 条件である WHERE 句
     * @return void
     */
    function sfMoveRank($tableName, $keyIdColumn, $keyId, $pos, $where = "") {
        $objQuery = new SC_Query();
        $objQuery->begin();

        // 自身のランクを取得する
        if($where != "") {
            $getWhere = "$keyIdColumn = ? AND " . $where;
        } else {
            $getWhere = "$keyIdColumn = ?";
        }
        $rank = $objQuery->get($tableName, "rank", $getWhere, array($keyId));

        $max = $objQuery->max($tableName, "rank", $where);

        // 値の調整（逆順）
        if($pos > $max) {
            $position = 1;
        } else if($pos < 1) {
            $position = $max;
        } else {
            $position = $max - $pos + 1;
        }

        //入れ替え先の順位が入れ換え元の順位より大きい場合
        if( $position > $rank ) $term = "rank - 1";

        //入れ替え先の順位が入れ換え元の順位より小さい場合
        if( $position < $rank ) $term = "rank + 1";

        // XXX 入れ替え先の順位が入れ替え元の順位と同じ場合
        if (!isset($term)) $term = "rank";

        // 指定した順位の商品から移動させる商品までのrankを１つずらす
        $sql = "UPDATE $tableName SET rank = $term WHERE rank BETWEEN ? AND ?";
        if($where != "") {
            $sql.= " AND $where";
        }

        if( $position > $rank ) $objQuery->exec( $sql, array( $rank + 1, $position ));
        if( $position < $rank ) $objQuery->exec( $sql, array( $position, $rank - 1 ));

        // 指定した順位へrankを書き換える。
        $sql  = "UPDATE $tableName SET rank = ? WHERE $keyIdColumn = ? ";
        if($where != "") {
            $sql.= " AND $where";
        }

        $objQuery->exec( $sql, array( $position, $keyId ) );
        $objQuery->commit();
    }

    /**
     * ランクを含むレコードを削除する.
     *
     * レコードごと削除する場合は、$deleteをtrueにする
     *
     * @param string $table テーブル名
     * @param string $colname カラム名
     * @param string|integer $id テーブルのキー
     * @param string $andwhere SQL の AND 条件である WHERE 句
     * @param bool $delete レコードごと削除する場合 true,
     *                     レコードごと削除しない場合 false
     * @return void
     */
    function sfDeleteRankRecord($table, $colname, $id, $andwhere = "",
                                $delete = false) {
        $objQuery = new SC_Query();
        $objQuery->begin();
        // 削除レコードのランクを取得する。
        $where = "$colname = ?";
        if($andwhere != "") {
            $where.= " AND $andwhere";
        }
        $rank = $objQuery->get($table, "rank", $where, array($id));

        if(!$delete) {
            // ランクを最下位にする、DELフラグON
            $sqlup = "UPDATE $table SET rank = 0, del_flg = 1 ";
            $sqlup.= "WHERE $colname = ?";
            // UPDATEの実行
            $objQuery->exec($sqlup, array($id));
        } else {
            $objQuery->delete($table, "$colname = ?", array($id));
        }

        // 追加レコードのランクより上のレコードを一つずらす。
        $where = "rank > ?";
        if($andwhere != "") {
            $where.= " AND $andwhere";
        }
        $sqlup = "UPDATE $table SET rank = (rank - 1) WHERE $where";
        $objQuery->exec($sqlup, array($rank));
        $objQuery->commit();
    }

    /**
     * 親IDの配列を元に特定のカラムを取得する.
     *
     * @param SC_Query $objQuery SC_Query インスタンス
     * @param string $table テーブル名
     * @param string $id_name ID名
     * @param string $col_name カラム名
     * @param array $arrId IDの配列
     * @return array 特定のカラムの配列
     */
    function sfGetParentsCol($objQuery, $table, $id_name, $col_name, $arrId ) {
        $col = $col_name;
        $len = count($arrId);
        $where = "";

        for($cnt = 0; $cnt < $len; $cnt++) {
            if($where == "") {
                $where = "$id_name = ?";
            } else {
                $where.= " OR $id_name = ?";
            }
        }

        $objQuery->setorder("level");
        $arrRet = $objQuery->select($col, $table, $where, $arrId);
        return $arrRet;
    }

    /**
     * カテゴリ変更時の移動処理を行う.
     *
     * @param SC_Query $objQuery SC_Query インスタンス
     * @param string $table テーブル名
     * @param string $id_name ID名
     * @param string $cat_name カテゴリ名
     * @param integer $old_catid 旧カテゴリID
     * @param integer $new_catid 新カテゴリID
     * @param integer $id ID
     * @return void
     */
    function sfMoveCatRank($objQuery, $table, $id_name, $cat_name, $old_catid, $new_catid, $id) {
        if ($old_catid == $new_catid) {
            return;
        }
        // 旧カテゴリでのランク削除処理
        // 移動レコードのランクを取得する。
        $where = "$id_name = ?";
        $rank = $objQuery->get($table, "rank", $where, array($id));
        // 削除レコードのランクより上のレコードを一つ下にずらす。
        $where = "rank > ? AND $cat_name = ?";
        $sqlup = "UPDATE $table SET rank = (rank - 1) WHERE $where";
        $objQuery->exec($sqlup, array($rank, $old_catid));
        // 新カテゴリでの登録処理
        // 新カテゴリの最大ランクを取得する。
        $max_rank = $objQuery->max($table, "rank", "$cat_name = ?", array($new_catid)) + 1;
        $where = "$id_name = ?";
        $sqlup = "UPDATE $table SET rank = ? WHERE $where";
        $objQuery->exec($sqlup, array($max_rank, $id));
    }

    /**
     * お届け時間を取得する.
     *
     * @param integer $payment_id 支払い方法ID
     * @return array お届け時間の配列
     */
    function sfGetDelivTime($payment_id = "") {
        $objQuery = new SC_Query();

        $deliv_id = "";
        $arrRet = array();

        if($payment_id != "") {
            $where = "del_flg = 0 AND payment_id = ?";
            $arrRet = $objQuery->select("deliv_id", "dtb_payment", $where, array($payment_id));
            $deliv_id = $arrRet[0]['deliv_id'];
        }

        if($deliv_id != "") {
            $objQuery->setorder("time_id");
            $where = "deliv_id = ?";
            $arrRet= $objQuery->select("time_id, deliv_time", "dtb_delivtime", $where, array($deliv_id));
        }

        return $arrRet;
    }

    /**
     * 都道府県、支払い方法から配送料金を取得する.
     *
     * @param array $arrData 各種情報
     * @return string 指定の都道府県, 支払い方法の配送料金
     */
    function sfGetDelivFee($arrData) {
        $pref = $arrData['deliv_pref'];
        $payment_id = isset($arrData['payment_id']) ? $arrData['payment_id'] : "";

        $objQuery = new SC_Query();

        $deliv_id = "";

        // 支払い方法が指定されている場合は、対応した配送業者を取得する
        if($payment_id != "") {
            $where = "del_flg = 0 AND payment_id = ?";
            $arrRet = $objQuery->select("deliv_id", "dtb_payment", $where, array($payment_id));
            $deliv_id = $arrRet[0]['deliv_id'];
        // 支払い方法が指定されていない場合は、先頭の配送業者を取得する
        } else {
            $where = "del_flg = 0";
            $objQuery->setOrder("rank DESC");
            $objQuery->setLimitOffset(1);
            $arrRet = $objQuery->select("deliv_id", "dtb_deliv", $where);
            $deliv_id = $arrRet[0]['deliv_id'];
        }

        // 配送業者から配送料を取得
        if($deliv_id != "") {

            // 都道府県が指定されていない場合は、東京都の番号を指定しておく
            if($pref == "") {
                $pref = 13;
            }

            $objQuery = new SC_Query();
            $where = "deliv_id = ? AND pref = ?";
            $arrRet= $objQuery->select("fee", "dtb_delivfee", $where, array($deliv_id, $pref));
        }
        return $arrRet[0]['fee'];
    }

    /**
     * 集計情報を元に最終計算を行う.
     *
     * @param array $arrData 各種情報
     * @param LC_Page $objPage LC_Page インスタンス
     * @param SC_CartSession $objCartSess SC_CartSession インスタンス
     * @param SC_Customer $objCustomer SC_Customer インスタンス
     * @return array 最終計算後の配列
     */
    function sfTotalConfirm($arrData, &$objPage, &$objCartSess, $objCustomer = "") {
        // 店舗基本情報を取得する
        $arrInfo = SC_Helper_DB_Ex::sf_getBasisData();
        
        // 未定義変数を定義
        if (!isset($arrData['deliv_pref'])) $arrData['deliv_pref'] = "";
        if (!isset($arrData['payment_id'])) $arrData['payment_id'] = "";
        if (!isset($arrData['charge'])) $arrData['charge'] = "";
        if (!isset($arrData['use_point'])) $arrData['use_point'] = "";
        if (!isset($arrData['add_point'])) $arrData['add_point'] = 0;

        // 税金の取得
        $arrData['tax'] = $objPage->tpl_total_tax;
        // 小計の取得
        $arrData['subtotal'] = $objPage->tpl_total_pretax;

        // 合計送料の取得
        $arrData['deliv_fee'] = 0;

        // 商品ごとの送料が有効の場合
        if (OPTION_PRODUCT_DELIV_FEE == 1) {
            // 全商品の合計送料を加算する
            $this->lfAddAllProductsDelivFee($arrData, $objPage, $objCartSess);
        }

        // 配送業者の送料が有効の場合
        if (OPTION_DELIV_FEE == 1) {
            // 都道府県、支払い方法から配送料金を加算する
            $this->lfAddDelivFee($arrData);
        }

        // 送料無料の購入数が設定されている場合
        if (DELIV_FREE_AMOUNT > 0) {
            // 商品の合計数量
            $total_quantity = $objCartSess->getTotalQuantity(true);
            
            if($total_quantity >= DELIV_FREE_AMOUNT) {
                $arrData['deliv_fee'] = 0;
            }
        }

        // 送料無料条件が設定されている場合
        if($arrInfo['free_rule'] > 0) {
            // 小計が無料条件を超えている場合
            if($arrData['subtotal'] >= $arrInfo['free_rule']) {
                $arrData['deliv_fee'] = 0;
            }
        }

        // 合計の計算
        $arrData['total'] = $objPage->tpl_total_pretax; // 商品合計
        $arrData['total']+= $arrData['deliv_fee'];      // 送料
        $arrData['total']+= $arrData['charge'];         // 手数料
        // お支払い合計
        $arrData['payment_total'] = $arrData['total'] - ($arrData['use_point'] * POINT_VALUE);
        // 加算ポイントの計算
        if (USE_POINT !== false) {
            $arrData['add_point'] = SC_Helper_DB_Ex::sfGetAddPoint($objPage->tpl_total_point, $arrData['use_point']);
                
            if($objCustomer != "") {
                // 誕生日月であった場合
                if($objCustomer->isBirthMonth()) {
                    $arrData['birth_point'] = BIRTH_MONTH_POINT;
                    $arrData['add_point'] += $arrData['birth_point'];
                }
            }
        }

        if($arrData['add_point'] < 0) {
            $arrData['add_point'] = 0;
        }
        return $arrData;
    }

    /**
     * レコードの存在チェックを行う.
     *
     * @param string $table テーブル名
     * @param string $col カラム名
     * @param array $arrval 要素の配列
     * @param array $addwhere SQL の AND 条件である WHERE 句
     * @return bool レコードが存在する場合 true
     */
    function sfIsRecord($table, $col, $arrval, $addwhere = "") {
        $objQuery = new SC_Query();
        $arrCol = split("[, ]", $col);

        $where = "del_flg = 0";

        if($addwhere != "") {
            $where.= " AND $addwhere";
        }

        foreach($arrCol as $val) {
            if($val != "") {
                if($where == "") {
                    $where = "$val = ?";
                } else {
                    $where.= " AND $val = ?";
                }
            }
        }
        $ret = $objQuery->get($table, $col, $where, $arrval);

        if($ret != "") {
            return true;
        }
        return false;
    }

    /**
     * メーカー商品数数の登録を行う.
     *
     * @param SC_Query $objQuery SC_Query インスタンス
     * @return void
     */
    function sfMaker_Count($objQuery){
        $sql = "";

        //テーブル内容の削除
        $objQuery->query("DELETE FROM dtb_maker_count");

        //各メーカーの商品数を数えて格納
        $sql = " INSERT INTO dtb_maker_count(maker_id, product_count, create_date) ";
        $sql .= " SELECT T1.maker_id, count(T2.maker_id), now() ";
        $sql .= " FROM dtb_maker AS T1 LEFT JOIN dtb_products AS T2";
        $sql .= " ON T1.maker_id = T2.maker_id ";
        $sql .= " WHERE T2.del_flg = 0 AND T2.status = 1 ";
        $sql .= " GROUP BY T1.maker_id, T2.maker_id ";
        $objQuery->query($sql);
    }

    /**
     * 選択中の商品のメーカーを取得する.
     *
     * @param integer $product_id プロダクトID
     * @param integer $maker_id メーカーID
     * @return array 選択中の商品のメーカーIDの配列
     *
     */
    function sfGetMakerId($product_id, $maker_id = 0, $closed = false) {
        if ($closed) {
            $status = "";
        } else {
            $status = "status = 1";
        }

        if (!$this->g_maker_on) {
            $this->g_maker_on = true;
            $maker_id = (int) $maker_id;
            $product_id = (int) $product_id;
            if (SC_Utils_Ex::sfIsInt($maker_id) && $maker_id != 0 && $this->sfIsRecord("dtb_maker","maker_id", $maker_id)) {
                $this->g_maker_id = array($maker_id);
            } else if (SC_Utils_Ex::sfIsInt($product_id) && $product_id != 0 && $this->sfIsRecord("dtb_products","product_id", $product_id, $status)) {
                $objQuery = new SC_Query();
                $where = "product_id = ?";
                $maker_id = $objQuery->getCol("dtb_products", "maker_id", "product_id = ?", array($product_id));
                $this->g_maker_id = $maker_id;
            } else {
                // 不正な場合は、空の配列を返す。
                $this->g_maker_id = array();
            }
        }
        return $this->g_maker_id;
    }

    /**
     * メーカーの取得を行う.
     *
     * $products_check:true商品登録済みのものだけ取得する
     *
     * @param string $addwhere 追加する WHERE 句
     * @param bool $products_check 商品の存在するカテゴリのみ取得する場合 true
     * @return array カテゴリツリーの配列
     */
    function sfGetMakerList($addwhere = "", $products_check = false) {
        $objQuery = new SC_Query();
        $where = "del_flg = 0";

        if($addwhere != "") {
            $where.= " AND $addwhere";
        }

        $objQuery->setoption("ORDER BY rank DESC");

        if($products_check) {
            $col = "T1.maker_id, name";
            $from = "dtb_maker AS T1 LEFT JOIN dtb_maker_count AS T2 ON T1.maker_id = T2.maker_id";
            $where .= " AND product_count > 0";
        } else {
            $col = "maker_id, name";
            $from = "dtb_maker";
        }

        $arrRet = $objQuery->select($col, $from, $where);

        $max = count($arrRet);
        for($cnt = 0; $cnt < $max; $cnt++) {
            $id = $arrRet[$cnt]['maker_id'];
            $name = $arrRet[$cnt]['name'];
            $arrList[$id].= $name;
        }
        return $arrList;
    }

    /**
     * 全商品の合計送料を加算する
     */
    function lfAddAllProductsDelivFee(&$arrData, &$objPage, &$objCartSess) {
        $arrData['deliv_fee'] += $this->lfCalcAllProductsDelivFee($arrData, $objCartSess);
    }

    /**
     * 全商品の合計送料を計算する
     */
    function lfCalcAllProductsDelivFee(&$arrData, &$objCartSess) {
        $objQuery = new SC_Query();
        $deliv_fee_total = 0;
        $max = $objCartSess->getMax();
        for ($i = 0; $i <= $max; $i++) {
            // 商品送料
            $deliv_fee = $objQuery->getOne('SELECT deliv_fee FROM dtb_products WHERE product_id = ?', array($_SESSION[$objCartSess->key][$i]['id'][0]));
            // 数量
            $quantity = $_SESSION[$objCartSess->key][$i]['quantity'];
            // 累積
            $deliv_fee_total += $deliv_fee * $quantity;
        }
        return $deliv_fee_total;
    }

    /**
     * 都道府県、支払い方法から配送料金を加算する.
     *
     * @param array $arrData 各種情報
     */
    function lfAddDelivFee(&$arrData) {
        $arrData['deliv_fee'] += $this->sfGetDelivFee($arrData);
    }

    /**
     * 受注の名称列を更新する
     *
     * @param integer $order_id 更新対象の注文番号
     * @param boolean $temp_table 更新対象は「受注_Temp」か
     */
    function sfUpdateOrderNameCol($order_id, $temp_table = false) {
        $objQuery = new SC_Query();
        
        if ($temp_table) {
            $tgt_table = 'dtb_order_temp';
            $sql_where = 'WHERE order_temp_id = ?';
        } else {
            $tgt_table = 'dtb_order';
            $sql_where = 'WHERE order_id = ?';
        }
        
        $sql = <<< __EOS__
            UPDATE
                {$tgt_table}
            SET
                 payment_method = (SELECT payment_method FROM dtb_payment WHERE payment_id = {$tgt_table}.payment_id)
                ,deliv_time = (SELECT deliv_time FROM dtb_delivtime WHERE time_id = {$tgt_table}.deliv_time_id AND deliv_id = {$tgt_table}.deliv_id)
            $sql_where
__EOS__;
        
        $objQuery->query($sql, array($order_id));
    }

    /**
     * 店舗基本情報に基づいて税金額を返す
     *
     * @param integer $price 計算対象の金額
     * @return integer 税金額
     */
    function sfTax($price) {
        // 店舗基本情報を取得
        $CONF = SC_Helper_DB_Ex::sf_getBasisData();
        
        return SC_Utils_Ex::sfTax($price, $CONF['tax'], $CONF['tax_rule']);
    }

    /**
     * 店舗基本情報に基づいて税金付与した金額を返す
     * 
     * @param integer $price 計算対象の金額
     * @return integer 税金付与した金額
     */
    function sfPreTax($price, $tax = null, $tax_rule = null) {
        // 店舗基本情報を取得
        $CONF = SC_Helper_DB_Ex::sf_getBasisData();
        
        return SC_Utils_Ex::sfPreTax($price, $CONF['tax'], $CONF['tax_rule']);
    }

    /**
     * 店舗基本情報に基づいて加算ポイントを返す
     *
     * @param integer $totalpoint
     * @param integer $use_point
     * @return integer 加算ポイント
     */
    function sfGetAddPoint($totalpoint, $use_point) {
        // 店舗基本情報を取得
        $CONF = SC_Helper_DB_Ex::sf_getBasisData();
        
        return SC_Utils_Ex::sfGetAddPoint($totalpoint, $use_point, $CONF['point_rate']);
    }

    /**
     * 受注.対応状況の更新
     *
     * ・必ず呼び出し元でトランザクションブロックを開いておくこと。
     *
     * @param integer $orderId 注文番号
     * @param integer|null $newStatus 対応状況 (null=変更無し)
     * @param integer|null $newAddPoint 加算ポイント (null=変更無し)
     * @param integer|null $newUsePoint ポイント (null=変更無し)
     * @return void
     */
    function sfUpdateOrderStatus($orderId, $newStatus = null, $newAddPoint = null, $newUsePoint = null) {
        $objQuery = new SC_Query();
        
        $arrOrderOld = $objQuery->getRow('dtb_order', 'status, add_point, use_point, customer_id', 'order_id = ?', array($orderId));
        
        // 対応状況
        if (is_null($newStatus)) {
            $newStatus = $arrOrderOld['status'];
        }
        
        if (USE_POINT !== false) {
            $addPoint = 0;
            
            // 使用ポイント
            if (!is_null($newUsePoint)) {
                $addPoint += $arrOrderOld['use_point']; // 変更前のポイントを戻す
                $addPoint -= $newUsePoint;              // 変更後のポイントを引く
            }
            
            // ▼加算ポイント
            // 変更前の状態が加算対象の場合、
            if (SC_Utils_Ex::sfIsAddPoint($arrOrderOld['status'])) {
                $addPoint -= $arrOrderOld['add_point'];
            }
            
            // 変更後の状態が加算対象の場合、
            if (SC_Utils_Ex::sfIsAddPoint($newStatus)) {
                $addPoint += is_null($newAddPoint) ? $arrOrderOld['add_point'] : $newAddPoint;
            }
            // ▲加算ポイント
            
            if ($addPoint != 0) {
                // ▼顧客テーブルの更新
                $sqlval = array();
                $where = '';
                $arrVal = array();
                $arrRawSql = array();
                $arrRawSqlVal = array();
                
                $sqlval['update_date'] = 'Now()';
                $arrRawSql['point'] = 'point + ?';
                $arrRawSqlVal[] = $addPoint;
                $where .= 'customer_id = ?';
                $arrVal[] = $arrOrderOld['customer_id'];
                
                $objQuery->update('dtb_customer', $sqlval, $where, $arrVal, $arrRawSql, $arrRawSqlVal);
                // ▲顧客テーブルの更新
                
                // ポイントをマイナスした場合、
                if ($addPoint < 0) {
                    $sql = 'SELECT point FROM dtb_customer WHERE customer_id = ?';
                    $point = $objQuery->getone($sql, array($arrOrderOld['customer_id']));
                    // 変更後のポイントがマイナスの場合、
                    if ($point < 0) {
                        // ロールバック
                        $objQuery->rollback();
                        // エラー
                        SC_Utils_Ex::sfDispSiteError(LACK_POINT);
                    }
                }
            }
        }
        
        // ▼受注テーブルの更新
        $sqlval = array();
        if (USE_POINT !== false) {
            if (!is_null($newAddPoint)) {
                $sqlval['add_point'] = $newAddPoint;
            }
            if (!is_null($newUsePoint)) {
                $sqlval['use_point'] = $newUsePoint;
            }
        }
        // ステータスが発送済みに変更の場合、発送日を更新
        if ($arrOrderOld['status'] != ORDER_DELIV && $newStatus == ORDER_DELIV) {
            $sqlval['commit_date'] = 'Now()';
        }
        $sqlval['status'] = $newStatus;
        $sqlval['update_date'] = 'Now()';
        
        $objQuery->update('dtb_order', $sqlval, 'order_id = ?', array($orderId));
        // ▲受注テーブルの更新
    }
}
?>