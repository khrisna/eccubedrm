<?php
/** �t�����g�\���֘A */
define('SAMPLE_ADDRESS1', "�s�撬�����i��F���c��_�c�_�ے��j");
/** �t�����g�\���֘A */
define('SAMPLE_ADDRESS2', "�Ԓn�E�r�����i��F1-3-5�j");
/** ���[�U�t�@�C���ۑ��� */
define('USER_DIR', "user_data/");
/** ���[�U�t�@�C���ۑ��� */
define('USER_PATH', HTML_PATH . USER_DIR);
/** ���[�U�C���N���[�h�t�@�C���ۑ��� */
define('USER_INC_PATH', USER_PATH . "include/");
/** DB�G���[���[�����M�� */
define('DB_ERROR_MAIL_TO', "");
/** DB�G���[���[������ */
define('DB_ERROR_MAIL_SUBJECT', "OS_TEST_ERROR");
/** �X�֔ԍ���pDB */
define('ZIP_DSN', DEFAULT_DSN);
/** ���[�U�[�쐬�y�[�W�� */
define('USER_URL', SITE_URL . USER_DIR);
/** �F�ؗp magic */
define('AUTH_MAGIC', "31eafcbd7a81d7b401a7fdc12bba047c02d1fae6");
/** �e���v���[�g�t�@�C���ۑ��� */
define('USER_TEMPLATE_DIR', "templates/");
/** �e���v���[�g�t�@�C���ۑ��� */
define('USER_PACKAGE_DIR', "packages/");
/** �e���v���[�g�t�@�C���ۑ��� */
define('USER_TEMPLATE_PATH', USER_PATH . USER_PACKAGE_DIR);
/** �e���v���[�g�t�@�C���ꎞ�ۑ��� */
define('TEMPLATE_TEMP_DIR', HTML_PATH . "upload/temp_template/");
/** ���[�U�[�쐬��ʂ̃f�t�H���gPHP�t�@�C�� */
define('USER_DEF_PHP', HTML_PATH . "__default.php");
/** ���̑���ʂ̃f�t�H���g�y�[�W���C�A�E�g */
define('DEF_LAYOUT', "products/list.php");
/** �_�E�����[�h���W���[���ۑ��f�B���N�g�� */
define('MODULE_DIR', "downloads/module/");
/** �_�E�����[�h���W���[���ۑ��f�B���N�g�� */
define('MODULE_PATH', DATA_PATH . MODULE_DIR);
/** HotFix�ۑ��f�B���N�g�� */
define('UPDATE_DIR', "downloads/update/");
/** HotFix�ۑ��f�B���N�g�� */
define('UPDATE_PATH', DATA_PATH . UPDATE_DIR);
/** DB�Z�b�V�����̗L������(�b) */
define('MAX_LIFETIME', 7200);
/** �}�X�^�f�[�^�L���b�V���f�B���N�g�� */
define('MASTER_DATA_DIR', DATA_PATH . "cache/");
/** �A�b�v�f�[�g�Ǘ��p�t�@�C���i�[�ꏊ */
define('UPDATE_HTTP', "http://sv01.ec-cube.net/info/index.php");
/** �A�b�v�f�[�g�Ǘ��pCSV1�s�ӂ�̍ő啶���� */
define('UPDATE_CSV_LINE_MAX', 4096);
/** �A�b�v�f�[�g�Ǘ��pCSV�J������ */
define('UPDATE_CSV_COL_MAX', 13);
/** ���W���[���Ǘ��pCSV�J������ */
define('MODULE_CSV_COL_MAX', 16);
/** ���i�w������ */
define('AFF_SHOPPING_COMPLETE', 1);
/** ���[�U�o�^���� */
define('AFF_ENTRY_COMPLETE', 2);
/** �����R�[�h */
define('CHAR_CODE', "UTF-8");
/** ���P�[���ݒ� */
define('LOCALE', "ja_JP.UTF-8");
/** ���σ��W���[���t�^���� */
define('ECCUBE_PAYMENT', "EC-CUBE");
/** PEAR::DB�̃f�o�b�O���[�h */
define('PEAR_DB_DEBUG', 9);
/** PEAR::DB�̎����I�ڑ��I�v�V���� */
define('PEAR_DB_PERSISTENT', false);
/** �o�b�`�����s����ŒZ�̊Ԋu(�b) */
define('LOAD_BATCH_PASS', 3600);
/** ���ߓ��̎w��(�����̏ꍇ�́A31���w�肵�Ă��������B) */
define('CLOSE_DAY', 31);
/** ��ʃT�C�g�G���[ */
define('FAVORITE_ERROR', 13);
/** ���C�u�����̃p�X */
define('LIB_DIR', DATA_PATH . "lib/");
/** �t�H���g�̃p�X */
define('TTF_DIR', DATA_PATH . "fonts/");
/** �O���t�i�[�f�B���N�g�� */
define('GRAPH_DIR', HTML_PATH . "upload/graph_image/");
/** �O���tURL */
define('GRAPH_URL', URL_DIR . "upload/graph_image/");
/** �~�O���t�ő�\���� */
define('GRAPH_PIE_MAX', 10);
/** �O���t�̃��x���̕����� */
define('GRAPH_LABEL_MAX', 40);
/** PDF�i�[�f�B���N�g�� */
define('PDF_DIR', DATA_PATH . "pdf/");
/** ���΂܂ŏW�v�̑ΏۂƂ��邩 */
define('BAT_ORDER_AGE', 70);
/** ���i�W�v�ŉ��ʂ܂ŕ\�����邩 */
define('PRODUCTS_TOTAL_MAX', 15);
/** 1:���J 2:����J */
define('DEFAULT_PRODUCT_DISP', 2);
/** ���������w�����i0�̏ꍇ�́A�������Ă������ɂȂ�Ȃ�) */
define('DELIV_FREE_AMOUNT', 0);
/** �z�����̐ݒ��ʕ\��(�L��:1 ����:0) */
define('INPUT_DELIV_FEE', 1);
/** ���i���Ƃ̑����ݒ�(�L��:1 ����:0) */
define('OPTION_PRODUCT_DELIV_FEE', 0);
/** �z���Ǝ҂��Ƃ̔z���������Z����(�L��:1 ����:0) */
define('OPTION_DELIV_FEE', 1);
/** �������ߏ��i�o�^(�L��:1 ����:0) */
define('OPTION_RECOMMEND', 1);
/** ���i�K�i�o�^(�L��:1 ����:0) */
define('OPTION_CLASS_REGIST', 1);
/** TV�A�����i�摜�� */
define('TV_IMAGE_WIDTH', 170);
/** TV�A�����i�摜�c */
define('TV_IMAGE_HEIGHT', 95);
/** TV�A�����i�ő�o�^�� */
define('TV_PRODUCTS_MAX', 10);
/** ����o�^�ύX(�}�C�y�[�W)�p�X���[�h�p */
define('DEFAULT_PASSWORD', "UAhgGR3L");
/** �������ߏ��i�� */
define('RECOMMEND_PRODUCT_MAX', 6);
/** �ʂ̂��͂���ő�o�^�� */
define('DELIV_ADDR_MAX', 20);
/** �{������ۑ��� */
define('CUSTOMER_READING_MAX', 30);
/** �Ǘ���ʃX�e�[�^�X�ꗗ�\������ */
define('ORDER_STATUS_MAX', 50);
/** �t�����g���r���[�������ݍő吔 */
define('REVIEW_REGIST_MAX', 5);
/** �f�o�b�O���[�h(true�FsfPrintR��DB�̃G���[���b�Z�[�W���o�͂���Afalse�F�o�͂��Ȃ�) */
define('DEBUG_MODE', false);
/** �Ǘ����[�UID(�����e�i���X�p�\������Ȃ��B) */
define('ADMIN_ID', "1");
/** ����o�^���ɉ�����m�F���[���𑗐M���邩�itrue:������Afalse:�{����j */
define('CUSTOMER_CONFIRM_MAIL', false);
/** �����}�K�z�M�}��(false:OFF�Atrue:ON) */
define('MELMAGA_SEND', true);
/** ���C���}�K�W���o�b�`���[�h(true:�o�b�`�ő��M���� ���vcron�ݒ�Afalse:���A���^�C���ő��M����) */
define('MELMAGA_BATCH_MODE', false);
/** ���O�C����ʃt���[�� */
define('LOGIN_FRAME', "login_frame.tpl");
/** �Ǘ���ʃt���[�� */
define('MAIN_FRAME', "main_frame.tpl");
/** ��ʃT�C�g��ʃt���[�� */
define('SITE_FRAME', "site_frame.tpl");
/** �F�ؕ����� */
define('CERT_STRING', "7WDhcBTF");
/** �_�~�[�p�X���[�h */
define('DUMMY_PASS', "########");
/** �݌ɐ��A�̔����������������B */
define('UNLIMITED', "++");
/** ���N�����o�^�J�n�N */
define('BIRTH_YEAR', 1901);
/** �{�V�X�e���̉ғ��J�n�N */
define('RELEASE_YEAR', 2005);
/** �N���W�b�g�J�[�h�̊����{���N */
define('CREDIT_ADD_YEAR', 10);
/** �e�J�e�S���̃J�e�S��ID�̍ő吔�i����ȉ��͐e�J�e�S���Ƃ���B) */
define('PARENT_CAT_MAX', 12);
/** GET�l�ύX�Ȃǂ̂��������h�����ߍő吔������݂���B */
define('NUMBER_MAX', 1000000000);
/** �|�C���g�̌v�Z���[��(1:�l�̌ܓ��A2:�؂�̂āA3:�؂�グ) */
define('POINT_RULE', 2);
/** 1�|�C���g������̒l�i(�~) */
define('POINT_VALUE', 1);
/** �Ǘ����[�h 1:�L���@0:����(�[�i��) */
define('ADMIN_MODE', 0);
/** ����W�v�o�b�`���[�h(true:�o�b�`�ŏW�v���� ���vcron�ݒ�Afalse:���A���^�C���ŏW�v����) */
define('DAILY_BATCH_MODE', false);
/** ���O�t�@�C���ő吔(���O�e�[�V����) */
define('MAX_LOG_QUANTITY', 5);
/** 1�̃��O�t�@�C���ɕۑ�����ő�e��(byte) */
define('MAX_LOG_SIZE', "1000000");
/** �g�����U�N�V����ID �̖��O */
define('TRANSACTION_ID_NAME', "transactionid");
/** �p�X���[�h�Y��̊m�F���[���𑗕t���邩�ۂ��B(0:���M���Ȃ��A1:���M����) */
define('FORGOT_MAIL', 0);
/** �o�^�ł���T�u���i�̐� */
define('HTML_TEMPLATE_SUB_MAX', 12);
/** ����������������Ƃ��ɋ������s����T�C�Y(���p) */
define('LINE_LIMIT_SIZE', 60);
/** �a�������|�C���g */
define('BIRTH_MONTH_POINT', 0);
/** ���[�g�J�e�S��ID */
define('ROOT_CATEGORY_1', 2);
/** ���[�g�J�e�S��ID */
define('ROOT_CATEGORY_2', 3);
/** ���[�g�J�e�S��ID */
define('ROOT_CATEGORY_3', 4);
/** ���[�g�J�e�S��ID */
define('ROOT_CATEGORY_4', 5);
/** ���[�g�J�e�S��ID */
define('ROOT_CATEGORY_5', 6);
/** ���[�g�J�e�S��ID */
define('ROOT_CATEGORY_6', 7);
/** ���[�g�J�e�S��ID */
define('ROOT_CATEGORY_7', 8);
/** �N���W�b�g�J�[�h */
define('PAYMENT_CREDIT_ID', 1);
/** �R���r�j���� */
define('PAYMENT_CONVENIENCE_ID', 2);
/** �g��摜�� */
define('LARGE_IMAGE_WIDTH', 500);
/** �g��摜�c */
define('LARGE_IMAGE_HEIGHT', 500);
/** �ꗗ�摜�� */
define('SMALL_IMAGE_WIDTH', 130);
/** �ꗗ�摜�c */
define('SMALL_IMAGE_HEIGHT', 130);
/** �ʏ�摜�� */
define('NORMAL_IMAGE_WIDTH', 260);
/** �ʏ�摜�c */
define('NORMAL_IMAGE_HEIGHT', 260);
/** �ʏ�T�u�摜�� */
define('NORMAL_SUBIMAGE_WIDTH', 200);
/** �ʏ�T�u�摜�c */
define('NORMAL_SUBIMAGE_HEIGHT', 200);
/** �g��T�u�摜�� */
define('LARGE_SUBIMAGE_WIDTH', 500);
/** �g��T�u�摜�c */
define('LARGE_SUBIMAGE_HEIGHT', 500);
/** �ꗗ�\���摜�� */
define('DISP_IMAGE_WIDTH', 65);
/** �ꗗ�\���摜�c */
define('DISP_IMAGE_HEIGHT', 65);
/** ���̑��̉摜1 */
define('OTHER_IMAGE1_WIDTH', 500);
/** ���̑��̉摜1 */
define('OTHER_IMAGE1_HEIGHT', 500);
/** HTML���[���e���v���[�g���[���S���摜�� */
define('HTMLMAIL_IMAGE_WIDTH', 110);
/** HTML���[���e���v���[�g���[���S���摜�c */
define('HTMLMAIL_IMAGE_HEIGHT', 120);
/** �摜�T�C�Y����(KB) */
define('IMAGE_SIZE', 1000);
/** CSV�T�C�Y����(KB) */
define('CSV_SIZE', 2000);
/** CSV�A�b�v���[�h1�s������̍ő啶���� */
define('CSV_LINE_MAX', 10000);
/** PDF�T�C�Y����(KB):���i�ڍ׃t�@�C���� */
define('PDF_SIZE', 5000);
/** �t�@�C���Ǘ���ʃA�b�v����(KB) */
define('FILE_SIZE', 10000);
/** �A�b�v�ł���e���v���[�g�t�@�C������(KB) */
define('TEMPLATE_SIZE', 10000);
/** �J�e�S���̍ő�K�w */
define('LEVEL_MAX', 5);
/** �ő�J�e�S���o�^�� */
define('CATEGORY_MAX', 1000);
/** �Ǘ��y�[�W�^�C�g�� */
define('ADMIN_TITLE', "EC�T�C�g�Ǘ��y�[�W");
/** �ҏW�������\���F */
define('SELECT_RGB', "#ffffdf");
/** ���͍��ږ������̕\���F */
define('DISABLED_RGB', "#C9C9C9");
/** �G���[���\���F */
define('ERR_COLOR', "#ffe8e8");
/** �e�J�e�S���\������ */
define('CATEGORY_HEAD', ">");
/** ���N�����I���J�n�N */
define('START_BIRTH_YEAR', 1901);
/** ���i���� */
define('NORMAL_PRICE_TITLE', "�ʏ퉿�i");
/** ���i���� */
define('SALE_PRICE_TITLE', "�̔����i");
/** ���O�t�@�C�� */
define('LOG_PATH', DATA_PATH . "logs/site.log");
/** ������O�C�� ���O�t�@�C�� */
define('CUSTOMER_LOG_PATH', DATA_PATH . "logs/customer.log");
/** �摜�ꎞ�ۑ� */
define('IMAGE_TEMP_DIR', HTML_PATH . "upload/temp_image/");
/** �摜�ۑ��� */
define('IMAGE_SAVE_DIR', HTML_PATH . "upload/save_image/");
/** �摜�ꎞ�ۑ�URL */
define('IMAGE_TEMP_URL', URL_DIR . "upload/temp_image/");
/** �摜�ۑ���URL */
define('IMAGE_SAVE_URL', URL_DIR . "upload/save_image/");
/** RSS�p�摜�ꎞ�ۑ�URL */
define('IMAGE_TEMP_URL_RSS', SITE_URL . "upload/temp_image/");
/** RSS�p�摜�ۑ���URL */
define('IMAGE_SAVE_URL_RSS', SITE_URL . "upload/save_image/");
/** �G���R�[�hCSV�̈ꎞ�ۑ��� */
define('CSV_TEMP_DIR', DATA_PATH . "upload/csv/");
/** �摜���Ȃ��ꍇ�ɕ\�� */
define('NO_IMAGE_URL', URL_DIR . "misc/blank.gif");
/** �摜���Ȃ��ꍇ�ɕ\�� */
define('NO_IMAGE_DIR', HTML_PATH . "misc/blank.gif");
/** �V�X�e���Ǘ��g�b�v */
define('URL_SYSTEM_TOP', URL_DIR . "admin/system/index.php");
/** �K�i�o�^ */
define('URL_CLASS_REGIST', URL_DIR . "admin/products/class.php");
/** �X�֔ԍ����� */
define('URL_INPUT_ZIP', URL_DIR . "input_zip.php");
/** �z���Ǝғo�^ */
define('URL_DELIVERY_TOP', URL_DIR . "admin/basis/delivery.php");
/** �x�������@�o�^ */
define('URL_PAYMENT_TOP', URL_DIR . "admin/basis/payment.php");
/** �T�C�g�Ǘ����o�^ */
define('URL_CONTROL_TOP', URL_DIR . "admin/basis/control.php");
/** �z�[�� */
define('URL_HOME', URL_DIR . "admin/home.php");
/** ���O�C���y�[�W */
define('URL_LOGIN', URL_DIR . "admin/index.php");
/** ���i�����y�[�W */
define('URL_SEARCH_TOP', URL_DIR . "admin/products/index.php");
/** �����ҏW�y�[�W */
define('URL_ORDER_EDIT', URL_DIR . "admin/order/edit.php");
/** �����ҏW�y�[�W */
define('URL_SEARCH_ORDER', URL_DIR . "admin/order/index.php");
/** �����ҏW�y�[�W */
define('URL_ORDER_MAIL', URL_DIR . "admin/order/mail.php");
/** ���O�A�E�g�y�[�W */
define('URL_LOGOUT', URL_DIR . "admin/logout.php");
/** �V�X�e���Ǘ�CSV�o�̓y�[�W */
define('URL_SYSTEM_CSV', URL_DIR . "admin/system/member_csv.php");
/** �Ǘ��y�[�W�pCSS�ۊǃf�B���N�g�� */
define('URL_ADMIN_CSS', URL_DIR . "admin/css/");
/** �L�����y�[���o�^�y�[�W */
define('URL_CAMPAIGN_TOP', URL_DIR . "admin/contents/campaign.php");
/** �L�����y�[���f�U�C���ݒ�y�[�W */
define('URL_CAMPAIGN_DESIGN', URL_DIR . "admin/contents/campaign_design.php");
/** �A�N�Z�X���� */
define('SUCCESS', 0);
/** ���O�C�����s */
define('LOGIN_ERROR', 1);
/** �A�N�Z�X���s�i�^�C���A�E�g���j */
define('ACCESS_ERROR', 2);
/** �A�N�Z�X�����ᔽ */
define('AUTH_ERROR', 3);
/** �s���ȑJ�ڃG���[ */
define('INVALID_MOVE_ERRORR', 4);
/** ���i�ꗗ�\���� */
define('PRODUCTS_LIST_MAX', 15);
/** �����o�[�Ǘ��y�[�W�\���s�� */
define('MEMBER_PMAX', 10);
/** �����y�[�W�\���s�� */
define('SEARCH_PMAX', 10);
/** �y�[�W�ԍ��̍ő�\���� */
define('NAVI_PMAX', 4);
/** ���i�T�u���ő吔 */
define('PRODUCTSUB_MAX', 5);
/** �z�����Ԃ̍ő�\���� */
define('DELIVTIME_MAX', 16);
/** �z�������̍ő�\���� */
define('DELIVFEE_MAX', 47);
/** �Z�����ڂ̕������i���O�Ȃ�) */
define('STEXT_LEN', 50);
define('SMTEXT_LEN', 100);
/** �������ڂ̕������i�Z���Ȃǁj */
define('MTEXT_LEN', 200);
/** �������̕������i�₢���킹�Ȃǁj */
define('MLTEXT_LEN', 1000);
/** �����̕����� */
define('LTEXT_LEN', 3000);
/** �������̕������i�����}�K�Ȃǁj */
define('LLTEXT_LEN', 99999);
/** URL�̕����� */
define('URL_LEN', 300);
/** �Ǘ���ʗp�FID�E�p�X���[�h�̕��������� */
define('ID_MAX_LEN', 15);
/** �Ǘ���ʗp�FID�E�p�X���[�h�̕��������� */
define('ID_MIN_LEN', 4);
/** ���z���� */
define('PRICE_LEN', 8);
/** ������ */
define('PERCENTAGE_LEN', 3);
/** �݌ɐ��A�̔������� */
define('AMOUNT_LEN', 6);
/** �X�֔ԍ�1 */
define('ZIP01_LEN', 3);
/** �X�֔ԍ�2 */
define('ZIP02_LEN', 4);
/** �d�b�ԍ��e���ڐ��� */
define('TEL_ITEM_LEN', 6);
/** �d�b�ԍ����� */
define('TEL_LEN', 12);
/** �t�����g��ʗp�F�p�X���[�h�̍ŏ������� */
define('PASSWORD_LEN1', 4);
/** �t�����g��ʗp�F�p�X���[�h�̍ő啶���� */
define('PASSWORD_LEN2', 10);
/** �������l�p����(INT) */
define('INT_LEN', 8);
/** �N���W�b�g�J�[�h�̕����� */
define('CREDIT_NO_LEN', 4);
/** �����J�e�S���ő�\��������(byte) */
define('SEARCH_CATEGORY_LEN', 18);
/** �t�@�C�����\�������� */
define('FILE_NAME_LEN', 10);
/** �w�������Ȃ��̏ꍇ�̍ő�w���� */
define('SALE_LIMIT_MAX', 10);
/** HTML�^�C�g�� */
define('SITE_TITLE', "�d�b-�b�t�a�d  �e�X�g�T�C�g");
/** �N�b�L�[�ێ�����(��) */
define('COOKIE_EXPIRE', 365);
/** �w�菤�i�y�[�W���Ȃ� */
define('PRODUCT_NOT_FOUND', 1);
/** �J�[�g������ */
define('CART_EMPTY', 2);
/** �y�[�W���ڃG���[ */
define('PAGE_ERROR', 3);
/** �w���������̃J�[�g���i�ǉ��G���[ */
define('CART_ADD_ERROR', 4);
/** ���ɂ��w���葱�����s��ꂽ�ꍇ */
define('CANCEL_PURCHASE', 5);
/** �w��J�e�S���y�[�W���Ȃ� */
define('CATEGORY_NOT_FOUND', 6);
/** ���O�C���Ɏ��s */
define('SITE_LOGIN_ERROR', 7);
/** �����p�y�[�W�ւ̃A�N�Z�X�G���[ */
define('CUSTOMER_ERROR', 8);
/** �w�����̔���؂�G���[ */
define('SOLD_OUT', 9);
/** �J�[�g�����i�̓Ǎ��G���[ */
define('CART_NOT_FOUND', 10);
/** �|�C���g�̕s�� */
define('LACK_POINT', 11);
/** ���o�^�҂����O�C���Ɏ��s */
define('TEMP_LOGIN_ERROR', 12);
/** URL�G���[ */
define('URL_ERROR', 13);
/** �t�@�C���𓀃G���[ */
define('EXTRACT_ERROR', 14);
/** FTP�_�E�����[�h�G���[ */
define('FTP_DOWNLOAD_ERROR', 15);
/** FTP���O�C���G���[ */
define('FTP_LOGIN_ERROR', 16);
/** FTP�ڑ��G���[ */
define('FTP_CONNECT_ERROR', 17);
/** DB�쐬�G���[ */
define('CREATE_DB_ERROR', 18);
/** DB�C���|�[�g�G���[ */
define('DB_IMPORT_ERROR', 19);
/** �ݒ�t�@�C�����݃G���[ */
define('FILE_NOT_FOUND', 20);
/** �������݃G���[ */
define('WRITE_FILE_ERROR', 21);
/** �t���[���b�Z�[�W */
define('FREE_ERROR_MSG', 999);
/** �J�e�S����؂蕶�� */
define('SEPA_CATNAVI', " > ");
/** �J�e�S����؂蕶�� */
define('SEPA_CATLIST', " | ");
/** ��������� */
define('URL_SHOP_TOP', SSL_URL . "shopping/index.php");
/** ����o�^�y�[�WTOP */
define('URL_ENTRY_TOP', SSL_URL . "entry/index.php");
/** �T�C�g�g�b�v */
define('URL_SITE_TOP', URL_DIR . "index.php");
/** �J�[�g�g�b�v */
define('URL_CART_TOP', URL_DIR . "cart/index.php");
/** �z�����Ԑݒ� */
define('URL_DELIV_TOP', URL_DIR . "shopping/deliv.php");
/** My�y�[�W�g�b�v */
define('URL_MYPAGE_TOP', SSL_URL . "mypage/login.php");
/** �w���m�F�y�[�W */
define('URL_SHOP_CONFIRM', URL_DIR . "shopping/confirm.php");
/** ���x�������@�I���y�[�W */
define('URL_SHOP_PAYMENT', URL_DIR . "shopping/payment.php");
/** �w��������� */
define('URL_SHOP_COMPLETE', URL_DIR . "shopping/complete.php");
/** �J�[�h���ω�� */
define('URL_SHOP_CREDIT', URL_DIR . "shopping/card.php");
/** ���[�����ω�� */
define('URL_SHOP_LOAN', URL_DIR . "shopping/loan.php");
/** �R���r�j���ω�� */
define('URL_SHOP_CONVENIENCE', URL_DIR . "shopping/convenience.php");
/** ���W���[���ǉ��p��� */
define('URL_SHOP_MODULE', URL_DIR . "shopping/load_payment_module.php");
/** ���i�g�b�v */
define('URL_PRODUCTS_TOP', URL_DIR . "products/top.php");
/** ���i�ꗗ(HTML�o��) */
define('LIST_P_HTML', URL_DIR . "products/list-p");
/** ���i�ꗗ(HTML�o��) */
define('LIST_C_HTML', URL_DIR . "products/list.php?mode=search&category_id=");
/** ���i�ڍ�(HTML�o��) */
define('DETAIL_P_HTML', URL_DIR . "products/detail.php?product_id=");
/** �}�C�y�[�W���͂���URL */
define('MYPAGE_DELIVADDR_URL', URL_DIR . "mypage/delivery.php");
/** ���[���A�h���X��� */
define('MAIL_TYPE_PC', 1);
/** ���[���A�h���X��� */
define('MAIL_TYPE_MOBILE', 2);
/** �V�K���� */
define('ORDER_NEW', 1);
/** �����҂� */
define('ORDER_PAY_WAIT', 2);
/** �����ς� */
define('ORDER_PRE_END', 6);
/** �L�����Z�� */
define('ORDER_CANCEL', 3);
/** ���񂹒� */
define('ORDER_BACK_ORDER', 4);
/** �����ς� */
define('ORDER_DELIV', 5);
/** �󒍊������̃X�e�[�^�X�ԍ� */
define('ODERSTATUS_COMMIT', ORDER_DELIV);
/** �V�����Ǘ���� �J�n�N(����)  */
define('ADMIN_NEWS_STARTYEAR', 2005);
/** ����o�^ */
define('ENTRY_CUSTOMER_TEMP_SUBJECT', "������o�^�������������܂����B");
/** ����o�^ */
define('ENTRY_CUSTOMER_REGIST_SUBJECT', "�{����o�^�������������܂����B");
/** �ē�������ԁi�P��: ����) */
define('ENTRY_LIMIT_HOUR', 1);
/** �I�X�X�����i�\���� */
define('RECOMMEND_NUM', 8);
/** �x�X�g���i�̍ő�o�^�� */
define('BEST_MAX', 5);
/** �x�X�g���i�̍ŏ��o�^���i�o�^���������Ȃ��ꍇ�͕\�����Ȃ��B) */
define('BEST_MIN', 3);
/** �z�B�\�ȓ��t�ȍ~�̃v���_�E���\���ő���� */
define('DELIV_DATE_END_MAX', 21);
/** �w������������o�^(1:�L���@0:����) */
define('PURCHASE_CUSTOMER_REGIST', 0);
/** ���̏��i�𔃂����l�͂���ȏ��i�������Ă��܂��@�\������ */
define('RELATED_PRODUCTS_MAX', 3);
/** �x������ */
define('CV_PAYMENT_LIMIT', 14);
/** �L�����y�[���o�^�ő吔 */
define('CAMPAIGN_REGIST_MAX', 20);
/** ���i���r���[��URL�������݂������邩�ۂ� */
define('REVIEW_ALLOW_URL', 0);
/** �g���b�N�o�b�N �\�� */
define('TRACKBACK_STATUS_VIEW', 1);
/** �g���b�N�o�b�N ��\�� */
define('TRACKBACK_STATUS_NOT_VIEW', 2);
/** �g���b�N�o�b�N �X�p�� */
define('TRACKBACK_STATUS_SPAM', 3);
/** �t�����g�ő�\���� */
define('TRACKBACK_VIEW_MAX', 10);
/** �g���b�N�o�b�N��URL */
define('TRACKBACK_TO_URL', SITE_URL . "tb/index.php?pid=");
/** �T�C�g�Ǘ� �g���b�N�o�b�N */
define('SITE_CONTROL_TRACKBACK', 1);
/** �T�C�g�Ǘ� �A�t�B���G�C�g */
define('SITE_CONTROL_AFFILIATE', 2);
/** Pear::Mail �o�b�N�G���h:mail|smtp|sendmail */
define('MAIL_BACKEND', "smtp");
/** OS���:WIN|LINUX */
define('OS_TYPE', "LINUX");
/** SMTP�T�[�o�[ */
define('SMTP_HOST', "127.0.0.1");
/** SMTP�|�[�g */
define('SMTP_PORT', "25");
/** �|�C���g�𗘗p���邩(true:���p����Afalse:���p���Ȃ�) (false �͈ꕔ�Ή�) */
define('USE_POINT', true);
/** �f�t�H���g�e���v���[�g�� */
define('DEFAULT_TEMPLATE_NAME', "default");
/** �e���v���[�g�� */
define('TEMPLATE_NAME', "default");
/** SMARTY�e���v���[�g */
define('SMARTY_TEMPLATES_DIR',  DATA_PATH . "Smarty/templates/");
/** SMARTY�e���v���[�g */
define('TPL_DIR', URL_DIR . USER_DIR . USER_PACKAGE_DIR . TEMPLATE_NAME . "/");
/** SMARTY�e���v���[�g */
define('TEMPLATE_DIR', SMARTY_TEMPLATES_DIR . TEMPLATE_NAME . "/");
/** SMARTY�e���v���[�g(�Ǘ��y�[�W) */
define('TEMPLATE_ADMIN_DIR',  SMARTY_TEMPLATES_DIR . DEFAULT_TEMPLATE_NAME . "/admin/");
/** SMARTY�R���p�C�� */
define('COMPILE_DIR', DATA_PATH . "Smarty/templates_c/" . TEMPLATE_NAME . "/");
/** SMARTY�R���p�C��(�Ǘ��y�[�W) */
define('COMPILE_ADMIN_DIR', COMPILE_DIR . "admin/");
/** SMARTY�e���v���[�g(FTP����) */
define('TEMPLATE_FTP_DIR', USER_PATH . USER_PACKAGE_DIR . TEMPLATE_NAME . "/");
/** SMARTY�R���p�C��(FTP����) */
define('COMPILE_FTP_DIR', COMPILE_DIR . USER_DIR);
/** �u���b�N�t�@�C���ۑ��� */
define('BLOC_DIR', "bloc/");
/** �u���b�N�t�@�C���ۑ��� */
define('BLOC_PATH', TEMPLATE_DIR . BLOC_DIR);
/** �L�����y�[���t�@�C���ۑ��� */
define('CAMPAIGN_DIR', "cp/");
/** �L�����y�[���֘A */
define('CAMPAIGN_URL', URL_DIR . CAMPAIGN_DIR);
/** �L�����y�[���֘A */
define('CAMPAIGN_PATH', HTML_PATH . CAMPAIGN_DIR);
/** �L�����y�[���֘A */
define('CAMPAIGN_TEMPLATE_DIR', "campaign/");
/** �L�����y�[���֘A */
define('CAMPAIGN_TEMPLATE_PATH', TEMPLATE_DIR . CAMPAIGN_TEMPLATE_DIR);
/** �L�����y�[���֘A */
define('CAMPAIGN_BLOC_DIR', "bloc/");
/** �L�����y�[���֘A */
define('CAMPAIGN_BLOC_PATH', CAMPAIGN_TEMPLATE_PATH . CAMPAIGN_BLOC_DIR);
/** �L�����y�[���֘A */
define('CAMPAIGN_TEMPLATE_ACTIVE', "active/");
/** �L�����y�[���֘A */
define('CAMPAIGN_TEMPLATE_END', "end/");
/** SMARTY�e���v���[�g(mobile) */
define('MOBILE_TEMPLATE_DIR', TEMPLATE_DIR . "mobile/");
/** SMARTY�R���p�C��(mobile) */
define('MOBILE_COMPILE_DIR', COMPILE_DIR . "mobile/");
/** �Z�b�V�����̑������� (�b) */
define('MOBILE_SESSION_LIFETIME', 1800);
/** �󃁁[���@�\���g�p���邩�ǂ��� */
define('MOBILE_USE_KARA_MAIL', false);
/** �󃁁[���󂯕t���A�h���X�̃��[�U�[������ */
define('MOBILE_KARA_MAIL_ADDRESS_USER', "eccube");
/** �󃁁[���󂯕t���A�h���X�̃��[�U�[���ƃR�}���h�̊Ԃ̋�؂蕶�� qmail �̏ꍇ�� - */
define('MOBILE_KARA_MAIL_ADDRESS_DELIMITER', "+");
/** �󃁁[���󂯕t���A�h���X�̃h���C������ */
define('MOBILE_KARA_MAIL_ADDRESS_DOMAIN', "");
/** �g�т̃��[���A�h���X�ł͂Ȃ����A�g�т��Ƃ݂Ȃ��h���C���̃��X�g �C�ӂ̐��́u,�v�u �v�ŋ�؂�B */
define('MOBILE_ADDITIONAL_MAIL_DOMAINS', "");
/** �g�ѓd�b�����ϊ��摜�ۑ��f�B���N�g�� */
define('MOBILE_IMAGE_DIR', HTML_PATH . "upload/mobile_image");
/** �g�ѓd�b�����ϊ��摜�ۑ��f�B���N�g�� */
define('MOBILE_IMAGE_URL', URL_DIR . "upload/mobile_image");
/** ���o�C��URL */
define('MOBILE_URL_SITE_TOP', MOBILE_URL_DIR . "index.php");
/** �J�[�g�g�b�v */
define('MOBILE_URL_CART_TOP', MOBILE_URL_DIR . "cart/index.php");
/** ��������� */
define('MOBILE_URL_SHOP_TOP', MOBILE_SSL_URL . "shopping/index.php");
/** �w���m�F�y�[�W */
define('MOBILE_URL_SHOP_CONFIRM', MOBILE_URL_DIR . "shopping/confirm.php");
/** ���x�������@�I���y�[�W */
define('MOBILE_URL_SHOP_PAYMENT', MOBILE_URL_DIR . "shopping/payment.php");
/** ���i�ڍ�(HTML�o��) */
define('MOBILE_DETAIL_P_HTML', MOBILE_URL_DIR . "products/detail.php?product_id=");
/** �w��������� */
define('MOBILE_URL_SHOP_COMPLETE', MOBILE_URL_DIR . "shopping/complete.php");
/** ���W���[���ǉ��p��� */
define('MOBILE_URL_SHOP_MODULE', MOBILE_URL_DIR . "shopping/load_payment_module.php");
/** �Z�b�V�����ێ��̕��@ */
define('SESSION_KEEP_METHOD', 'useCookie');
/** �Z�b�V�����̑������� (�b) */
define('SESSION_LIFETIME', 1800);
/** �I�[�i�[�Y�X�g�AURL */
define('OSTORE_URL', "http://store.ec-cube.net/");
/** �I�[�i�[�Y�X�g�AURL */
define('OSTORE_SSLURL', "https://store.ec-cube.net/");
/** �I�[�i�[�Y�X�g�A���O�p�X */
define('OSTORE_LOG_PATH', DATA_PATH . "logs/ownersstore.log");
/** �I�[�i�[�Y�X�g�A�ʐM�X�e�[�^�X */
define('OSTORE_STATUS_ERROR', 'ERROR');
/** �I�[�i�[�Y�X�g�A�ʐM�X�e�[�^�X */
define('OSTORE_STATUS_SUCCESS', 'SUCCESS');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_UNKNOWN', '1000');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_INVALID_PARAM', '1001');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_NO_CUSTOMER', '1002');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_WRONG_URL_PASS', '1003');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_NO_PRODUCTS', '1004');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_NO_DL_DATA', '1005');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_DL_DATA_OPEN', '1006');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_DLLOG_AUTH', '1007');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_ADMIN_AUTH', '2001');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_HTTP_REQ', '2002');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_HTTP_RESP', '2003');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_FAILED_JSON_PARSE', '2004');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_NO_KEY', '2005');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_INVALID_ACCESS', '2006');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_INVALID_PARAM', '2007');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_AUTOUP_DISABLE', '2008');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_PERMISSION', '2009');
/** �I�[�i�[�Y�X�g�A�ʐM�G���[�R�[�h */
define('OSTORE_E_C_BATCH_ERR', '2010');
/** ���C�ɓ��菤�i�o�^(�L��:1 ����:0) */
define('OPTION_FAVOFITE_PRODUCT','1');
/** ���C�ɓ��菤�i��\������ۂɁA�݌ɂȂ����i�̕\���E��\��(��\��:true �\��:false) */
define('NOSTOCK_HIDDEN', false);
/** �摜���l�[���ݒ�i���i�摜�̂݁j */
define('IMAGE_RENAME', true);
/*�@CUORECUSTOM�@START */
/** 1:�����i 2:�_�E�����[�h */
define('DEFAULT_PRODUCT_DOWN', 1);
/** �_�E�����[�h�̔��t�@�C���p�T�C�Y����(KB) */
define('DOWN_SIZE', 50000);
/** �_�E�����[�h�t�@�C���ꎞ�ۑ� */
define('DOWN_TEMP_DIR', DATA_PATH . "download/temp/");
/** �_�E�����[�h�t�@�C���ۑ��� */
define('DOWN_SAVE_DIR', DATA_PATH . "download/save/");
/** �_�E�����[�h�t�@�C�����݃G���[ */
define('DOWNFILE_NOT_FOUND', 22);
/** �������� */
define('DOWNLOAD_DAYS_LEN', 3);
/** �_�E�����[�h�񐔌��� */
define('DOWNLOAD_CNT_LEN', 3);
/*�@CUORECUSTOM�@END */
?>
