<?php /* Smarty version 2.6.13, created on 2009-10-02 22:32:42
         compiled from install_frame.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'install_frame.tpl', 25, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo ((is_array($_tmp=@CHAR_CODE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
<meta http-equiv="content-script-type" content="text/javascript">
<meta http-equiv="content-style-type" content="text/css">
<link rel="stylesheet" href="../admin/css/contents.css" type="text/css" >
<link rel="stylesheet" href="../admin/css/install.css" type="text/css" >
<?php $this->assign('default_dir', (@USER_DIR).(@USER_PACKAGE_DIR).(@DEFAULT_TEMPLATE_NAME)); ?>
<script type="text/javascript" src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/js/css.js"></script>
<script type="text/javascript" src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/js/navi.js"></script>
<title>EC CUBE インストール画面</title>
</head>

<body bgcolor="#ffffff" text="#000000" link="#006699" vlink="#006699" alink="#006699" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<noscript>
<link rel="stylesheet" href="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/css/common.css" type="text/css" >
</noscript>
<div align="center">
<a name="top"></a>

<!--▼HEADER-->
<table width="912" border="0" cellspacing="0" cellpadding="0" summary=" ">
    <tr valign="top">
        <td><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/header/header_left.jpg" width="17" height="50" alt=""></td>
        <td>
        <table width="878" border="0" cellspacing="0" cellpadding="0" summary=" " background="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/header/header_bg2.jpg">
            <tr valign="top">
                <td><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/admin/header/logo.jpg" width="230" height="50" alt="EC CUBE" border="0"></td>
                <td width="648" align="right"></td>
            </tr>
        </table>
        </td>
        <td><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/header/header_right.jpg" width="17" height="50" alt=""></td>
    </tr>
</table>
<!--▲HEADER-->

<!--▼CONTENTS-->
<table width="912" border="0" cellspacing="0" cellpadding="0" summary=" ">
    <tr valign="top">
        <td background="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/left_bg.jpg"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/left.jpg" width="17" height="443" alt=""></td>
        <td>
        <!--★★メインコンテンツ★★-->
        <table width="878" border="0" cellspacing="0" cellpadding="0" summary=" ">
            <tr valign="top">
                <td class="mainbg" align="center" height="450">
                <table width="562" border="0" cellspacing="0" cellpadding="0" summary=" ">
                    <tr><td height="40"></td></tr>
                    <tr>
                        <td colspan="3"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/contents/error_top.jpg" width="562" height="14" alt=""></td>
                    </tr>
                    <tr>
                        <td background="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/contents/main_left.jpg"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/_.gif" width="14" height="1" alt=""></td>
                        <td bgcolor="#cccccc">
                        <!--検索条件設定テーブルここから-->
                        <table width="534" border="0" cellspacing="0" cellpadding="0" summary=" ">
                            <tr>
                                <td bgcolor="#ffffff" align="center">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_mainpage'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                </td>
                            </tr>
                        </table>
                        <!--検索条件設定テーブルここまで-->
                        </td>
                        <td background="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/contents/main_right.jpg"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/_.gif" width="14" height="1" alt=""></td>
                    </tr>
                    <tr>
                        <td colspan="3"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/contents/error_bottom.jpg" width="562" height="14" alt=""></td>
                    </tr>
                    <tr><td height="40"></td></tr>
                </table>
                <?php if (strlen ( ((is_array($_tmp=$this->_tpl_vars['install_info_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) != 0): ?>
                <table width="562" border="0" cellspacing="0" cellpadding="0" summary=" ">
                    <tr>
                        <td align="center">
                            <iframe src="<?php echo ((is_array($_tmp=$this->_tpl_vars['install_info_url'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" width="562" height="460" frameborder="no" scrolling="no">
                                                         こちらはEC-CUBEからのお知らせです。この部分は iframe対応ブラウザでご覧下さい。
                            </iframe>
                        </td>
                    </tr>
                    <tr><td height="20"></td></tr>
                </table>
                <?php endif; ?>
                </td>
            </tr>
        </table>
        <!--★★メインコンテンツ★★-->
        </td>
        <td background="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/right_bg.jpg"><div align="justify"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/right.jpg" width="17" height="443" alt=""></div></td>
    </tr>
</table>
<!--▲CONTENTS-->

<!--▼FOOTER-->
<table width="912" border="0" cellspacing="0" cellpadding="0" summary=" ">
    <tr valign="top">
        <td background="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/left_bg.jpg"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/_.gif" width="17" height="1" alt=""></td>
        <td bgcolor="#636469">
        <table width="878" border="0" cellspacing="0" cellpadding="0" summary=" ">
            <tr>
                <td align="center" bgcolor="#f0f0f0">
                <table width="840" border="0" cellspacing="0" cellpadding="0" summary=" ">
                    <tr>
                        <td height="45" align="right"><a href="#top"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/admin/common/pagetop.gif" width="105" height="17" alt="GO TO PAGE TOP" border="0"></a></td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        <table width="878" border="0" cellspacing="0" cellpadding="10" summary=" ">
            <tr>
                <td class="fs10n"><span class="gray">&nbsp;Copyright &copy; 2000-2007 LOCKON CO.,LTD. All Rights Reserved.</span></td>
            </tr>
        </table>
        </td>
        <td background="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/right_bg.jpg"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/_.gif" width="17" height="1" alt=""></td>
    </tr>
    <tr>
        <td colspan="3"><img src="../<?php echo ((is_array($_tmp=$this->_tpl_vars['default_dir'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
/img/common/fotter.jpg" width="912" height="19" alt=""></td>
    </tr>
    <tr><td height="10"></td></tr>
</table>
<!--▲FOOTER-->
</div>

</body>
</html>