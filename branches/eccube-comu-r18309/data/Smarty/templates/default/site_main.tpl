<!--{*
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
 *}-->
<body onload="preLoadImg('<!--{$TPL_DIR}-->'); <!--{$tpl_onload}-->">
<!--{* A8タグ表示用 *}-->
<!--{if "sfPrintA8Tag"|function_exists === TRUE}-->
<!--{include file=`$smarty.const.MODULE_PATH`mdl_a8/print_a8_tag.tpl}-->
<!--{/if}-->

<!--{$GLOBAL_ERR}-->
<noscript>
  <p>JavaScript を有効にしてご利用下さい.</p>
</noscript>

<a name="top" id="top"></a>

<!--{* ▼HeaderHeaderTop COLUMN*}-->
  <!--{if $arrPageLayout.HeaderTopNavi|@count > 0}-->
  <div id="headertopcolumn">
    <!--{* ▼上ナビ *}-->
      <!--{foreach key=HeaderTopNaviKey item=HeaderTopNaviItem from=$arrPageLayout.HeaderTopNavi}-->
        <!-- ▼<!--{$HeaderTopNaviItem.bloc_name}--> ここから-->
          <!--{if $HeaderTopNaviItem.php_path != ""}-->
            <!--{include_php file=$HeaderTopNaviItem.php_path}-->
          <!--{else}-->
            <!--{include file=$HeaderTopNaviItem.tpl_path}-->
          <!--{/if}-->
        <!-- ▲<!--{$HeaderTopNaviItem.bloc_name}--> ここまで-->
      <!--{/foreach}-->
    <!--{* ▲上ナビ *}-->
  </div>
  <!--{/if}-->
<!--{* ▲HeaderHeaderTop COLUMN*}-->
<!--{* ▼HEADER *}-->
<!--{if $arrPageLayout.header_chk != 2}-->
<!--{include file= $header_tpl}-->
<!--{/if}-->
<!--{* ▲HEADER *}-->

<!--{* ▼CONTENTS *}-->
<div id="container">

<!--{* ▼TOP COLUMN*}-->
  <!--{if $arrPageLayout.TopNavi|@count > 0}-->
  <div id="topcolumn">
    <!--{* ▼上ナビ *}-->
      <!--{foreach key=TopNaviKey item=TopNaviItem from=$arrPageLayout.TopNavi}-->
        <!-- ▼<!--{$TopNaviItem.bloc_name}--> ここから-->
          <!--{if $TopNaviItem.php_path != ""}-->
            <!--{include_php file=$TopNaviItem.php_path}-->
          <!--{else}-->
            <!--{include file=$TopNaviItem.tpl_path}-->
          <!--{/if}-->
        <!-- ▲<!--{$TopNaviItem.bloc_name}--> ここまで-->
      <!--{/foreach}-->
    <!--{* ▲上ナビ *}-->
  </div>
  <!--{/if}-->
<!--{* ▲TOP COLUMN*}-->

  <!--{* ▼LEFT COLUMN *}-->
  <!--{if $arrPageLayout.LeftNavi|@count > 0}-->
  <div id="leftcolumn">
    <!--{* ▼左ナビ *}-->
      <!--{foreach key=LeftNaviKey item=LeftNaviItem from=$arrPageLayout.LeftNavi}-->
        <!-- ▼<!--{$LeftNaviItem.bloc_name}--> ここから-->
          <!--{if $LeftNaviItem.php_path != ""}-->
            <!--{include_php file=$LeftNaviItem.php_path}-->
          <!--{else}-->
            <!--{include file=$LeftNaviItem.tpl_path}-->
          <!--{/if}-->
        <!-- ▲<!--{$LeftNaviItem.bloc_name}--> ここまで-->
      <!--{/foreach}-->
    <!--{* ▲左ナビ *}-->
  </div>
  <!--{/if}-->
  <!--{* ▲LEFT COLUMN *}-->

  <!--{* ▼CENTER COLUMN *}-->
  <!--{if $tpl_column_num == 3}-->
  <div id="three_maincolumn">
  <!--{elseif $tpl_column_num == 2}-->
  <div id="two_maincolumn">
  <!--{elseif $tpl_column_num == 1}-->
  <div id="one_maincolumn">
  <!--{/if}-->
    <!--{* ▼メイン上部 *}-->
    <!--{if $arrPageLayout.MainHead|@count > 0}-->
      <!--{foreach key=MainHeadKey item=MainHeadItem from=$arrPageLayout.MainHead}-->
        <!-- ▼<!--{$MainHeadItem.bloc_name}--> ここから-->
        <!--{if $MainHeadItem.php_path != ""}-->
          <!--{include_php file=$MainHeadItem.php_path}-->
        <!--{else}-->
          <!--{include file=$MainHeadItem.tpl_path}-->
        <!--{/if}-->
        <!-- ▲<!--{$MainHeadItem.bloc_name}--> ここまで-->
      <!--{/foreach}-->
    <!--{/if}-->
    <!--{* ▲メイン上部 *}-->
    
    <!--{* ▼メイン *}-->
    <!--{include file=$tpl_mainpage}-->
    <!--{* ▲メイン *}-->
    
    <!--{* ▼メイン下部 *}-->
    <!--{if $arrPageLayout.MainFoot|@count > 0}-->
      <!--{foreach key=MainFootKey item=MainFootItem from=$arrPageLayout.MainFoot}-->
        <!-- ▼<!--{$MainFootItem.bloc_name}--> ここから-->
        <!--{if $MainFootItem.php_path != ""}-->
          <!--{include_php file=$MainFootItem.php_path}-->
        <!--{else}-->
          <!--{include file=$MainFootItem.tpl_path}-->
        <!--{/if}-->
        <!-- ▲<!--{$MainFootItem.bloc_name}--> ここまで-->
      <!--{/foreach}-->
    <!--{/if}-->
    <!--{* ▲メイン下部 *}-->
  </div>
  <!--{* ▲CENTER COLUMN *}-->

  <!--{* ▼RIGHT COLUMN *}-->
  <!--{if $arrPageLayout.RightNavi|@count > 0}-->
  <div id="rightcolumn">
    <!--{* ▼右ナビ *}-->
      <!--{foreach key=RightNaviKey item=RightNaviItem from=$arrPageLayout.RightNavi}-->
        <!-- ▼<!--{$RightNaviItem.bloc_name}--> ここから-->
        <!--{if $RightNaviItem.php_path != ""}-->
          <!--{include_php file=$RightNaviItem.php_path}-->
        <!--{else}-->
          <!--{include file=$RightNaviItem.tpl_path}-->
        <!--{/if}-->
        <!-- ▲<!--{$RightNaviItem.bloc_name}--> ここまで-->
      <!--{/foreach}-->
    <!--{* ▲右ナビ *}-->
  </div>
  <!--{/if}-->
  <!--{* ▲RIGHT COLUMN *}-->
  
      <!--{* ▼BOTTOM COLUMN*}-->
      <!--{if $arrPageLayout.BottomNavi|@count > 0}-->
      <div id="bottomcolumn">
        <!--{* ▼下ナビ *}-->
          <!--{foreach key=BottomNaviKey item=BottomNaviItem from=$arrPageLayout.BottomNavi}-->
            <!-- ▼<!--{$BottomNaviItem.bloc_name}--> ここから-->
              <!--{if $BottomNaviItem.php_path != ""}-->
                <!--{include_php file=$BottomNaviItem.php_path}-->
              <!--{else}-->
                <!--{include file=$BottomNaviItem.tpl_path}-->
              <!--{/if}-->
            <!-- ▲<!--{$BottomNaviItem.bloc_name}--> ここまで-->
          <!--{/foreach}-->
        <!--{* ▲下ナビ *}-->
      </div>
      <!--{/if}-->
    <!--{* ▲BOTTOM COLUMN*}-->

</div>
<!--{* ▲CONTENTS *}-->

<!--{* ▼FOTTER *}-->
<!--{if $arrPageLayout.footer_chk != 2}-->
<!--{include file=$footer_tpl}-->
<!--{/if}-->
<!--{* ▲FOTTER *}-->
<!--{* ▼FooterBottom COLUMN*}-->
  <!--{if $arrPageLayout.FooterBottomNavi|@count > 0}-->
  <div id="footerbottomcolumn">
    <!--{* ▼上ナビ *}-->
      <!--{foreach key=FooterBottomNaviKey item=FooterBottomNaviItem from=$arrPageLayout.FooterBottomNavi}-->
        <!-- ▼<!--{$FooterBottomNaviItem.bloc_name}--> ここから-->
          <!--{if $FooterBottomNaviItem.php_path != ""}-->
            <!--{include_php file=$FooterBottomNaviItem.php_path}-->
          <!--{else}-->
            <!--{include file=$FooterBottomNaviItem.tpl_path}-->
          <!--{/if}-->
        <!-- ▲<!--{$FooterBottomNaviItem.bloc_name}--> ここまで-->
      <!--{/foreach}-->
    <!--{* ▲上ナビ *}-->
  </div>
  <!--{/if}-->
<!--{* ▲FooterBottom COLUMN*}-->

<!--{* EBiSタグ表示用 *}-->
<!--{$tpl_mainpage|sfPrintEbisTag}-->
<!--{* アフィリエイトタグ表示用 *}-->
<!--{$tpl_conv_page|sfPrintAffTag:$tpl_aff_option}-->
</body>