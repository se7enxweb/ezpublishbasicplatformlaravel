<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
// set the site title

$SiteTitle = $ini->read_var( "site", "SiteTitle" );

if ( isset( $SiteTitleAppend ) )
    print( $SiteTitle . " - " . $SiteTitleAppend );
else
    print( $SiteTitle );

?></title><?php

// check if we need a http-equiv refresh
if ( isset( $MetaRedirectLocation ) && isset( $MetaRedirectTimer ) )
{
    print( "<META HTTP-EQUIV=Refresh CONTENT=\"$MetaRedirectTimer; URL=$MetaRedirectLocation\" />" );
}

?>
<link rel="stylesheet" type="text/css" href="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/responsive.css" />

<script language="JavaScript1.2">
<!--//

   function MM_swapImgRestore()
   {
      var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
   }

   function MM_preloadImages()
   {
      var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
      var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
      if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
   }

   function MM_findObj(n, d)
   {
      var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
      d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
      if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
      for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
   }

   function MM_swapImage()
   {
      var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
      if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
   }

//-->
</script>

<!-- set the content meta information -->

<meta name="author" content="<?php

    $SiteAuthor = $ini->read_var( "site", "SiteAuthor" );
    print( $SiteAuthor );

?>" />
<meta name="copyright" content="<?php

    $SiteCopyright = $ini->read_var( "site", "SiteCopyright" );
    print( $SiteCopyright );

?>" />
<meta name="description" content="<?php

if ( isset( $SiteDescriptionOverride ) )
{
    print( $SiteDescriptionOverride );
}
else
{
    $SiteDescription = $ini->read_var( "site", "SiteDescription" );
    print( $SiteDescription );
}

?>" />
<meta name="keywords" content="<?php
if ( isset( $SiteKeywordsOverride ) )
{
    print( $SiteKeywordsOverride );
}
else
{
    $SiteKeywords = $ini->read_var( "site", "SiteKeywords" );
    print( $SiteKeywords );
}

?>" />
<meta name="MSSmartTagsPreventParsing" content="TRUE" />

<meta name="generator" content="eZ publish" />

</head>

<body bgcolor="#999999" topmargin="6" marginheight="6" leftmargin="6" marginwidth="6"
      onload="MM_preloadImages('<?php //print $GlobalSiteIni->WWWDir; ?>/design/base/images/icons/redigerminimrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/base/images/icons/slettminimrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/base/images/icons/downloadminimrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/base/images/icons/addminimrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/intranet/images/tab-unmrk-mrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/intranet/images/tab-mrk-unmrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/standard/images/tab-unmrk-mrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/standard/images/tab-mrk-unmrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/news/images/tab-unmrk-mrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/news/images/tab-mrk-unmrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/trade/images/tab-unmrk-mrk.gif',
              '<?php //print $GlobalSiteIni->WWWDir; ?>/design/trade/images/tab-mrk-unmrk.gif'
              )">
<table class="body" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
   <td>

<table class="all" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
   <td class="tdmini" width="99%" colspan="2">
     <a class="logo" href="<?php print $GlobalSiteIni->WWWDir; ?>/"><img class="logoImage" src="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/images/ezpublish-yourcontentmadeeasy.gif" height="20" width="290" border="0" alt="" /></a><br />
   </td>
</tr>
   <tr>
     <td class="tdmini" width="99%" colspan="2" style="top: -2.5px; position: relative;">
       <?php /*
     <!--     <a class="logo" href="<?php print $GlobalSiteIni->WWWDir; ?>/"><img class="logoImage" src="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/images/ezpublish-yourcontentmadeeasy.gif" height="20" width="290" border="0" alt="" /></a><br />
   </td>
   <td class="tdmini" width="1%" align="right" style="top: -2.5px; position: relative;">
     -->
*/ ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
        <td class="tdmini" width="0%">
        <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/images/tab-mrk-left.gif" height="20" width="20" border="0" alt="" /><br />
        </td>
        <td class="tab" bgcolor="#ffffff" width="30%">&nbsp;&nbsp;<a href="<?php print $GlobalSiteIni->WWWDir . $GlobalSiteIni->Index; ?>/section-standard/">Standard</a>&nbsp;&nbsp;</td>
        <td class="tdmini" width="0%">
        <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/images/tab-mrk-unmrk.gif" height="20" width="20" border="0" alt="" /><br />
        </td>
        <td class="tab" bgcolor="#dcdcdc" width="30%">&nbsp;&nbsp;<a href="<?php print $GlobalSiteIni->WWWDir . $GlobalSiteIni->Index; ?>/section-intranet/">Intranet</a>&nbsp;&nbsp;</td>
        <td class="tdmini" width="0%">
        <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/images/tab-unmrk-unmrk.gif" height="20" width="20" border="0" alt="" /><br />
        </td>
        <td class="tab" bgcolor="#dcdcdc" width="30%">&nbsp;&nbsp;<a href="<?php print $GlobalSiteIni->WWWDir . $GlobalSiteIni->Index; ?>/section-trade/">Trade</a>&nbsp;&nbsp;</td>
        <td class="tdmini" width="0%">
        <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/images/tab-unmrk-unmrk.gif" height="20" width="20" border="0" alt="" /><br />
        </td>
        <td class="tab" bgcolor="#dcdcdc" width="30%">&nbsp;&nbsp;<a href="<?php print $GlobalSiteIni->WWWDir . $GlobalSiteIni->Index; ?>/section-news/">News</a>&nbsp;&nbsp;</td>
        <td class="tdmini" width="0%">
        <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/<?php print ($GlobalSiteDesign); ?>/images/tab-unmrk-right.gif" height="20" width="20" border="0" alt="" /><br />
        </td>
</tr>
</table>

        </td>
</tr>
</table>

<table class="main-body" width="100%" border="0" cellspacing="0" cellpadding="4" style="top: -2.5px; position: relative;">
<tr valign="top">
    <td class="menu-left" width="1%" bgcolor="#f0f0f0">
   <!-- Left menu start -->
   <?php
    $CategoryID = 0;
   include( "kernel/ezarticle/user/menubox.php" );
   ?>

    <?php
    $CategoryID = 1;
   include( "kernel/ezarticle/user/headlines.php" );
    ?>

   <?php
   include( "kernel/ezlink/user/menubox.php" );
   ?>

   <?php
    // include the static pages for category 2
    $CategoryID = 1;
    include( "kernel/ezarticle/user/articlelinks.php" );
   ?>

   <!-- Left menu end -->

   <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/base/images/design/1x1.gif" width="130" height="8" border="0"><br />
   </td>

   <!-- td width="1%" bgcolor="#ffffff"><img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/base/images/design/1x1.gif" width="2" height="1" border="0" alt="" /></td -->
   <td width="96%" bgcolor="#ffffff">
<!--
    <?php
//    $CategoryID = 1;
//    $Limit = 1;
//   include( "kernelkernelezad/user/adlist.php" );
    ?>
-->


    <!-- Banner start -->

    <!-- Banner end-->

<!-- Main content view start -->

   <?php
   print( $MainContents );
   ?>

<!-- Main content view end -->

    <br />
    </td>
    <!-- td width="1%" bgcolor="#ffffff"><img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/base/images/design/1x1.gif" width="2" height="1" border="0" alt="" /></td -->

    <td class="menu-right" width="1%" bgcolor="#f0f0f0">

    <!-- Right menu start -->

    <?php
    $NoAddress = true;
   include( "kernel/ezuser/user/userbox.php" );
    ?>

    <?php
    // a short list of articles from the given category
    // shows $Limit number starting from offset $Offset
    $CategoryID=1;
    $Offset=0;
    $Limit=2;
    include( "kernel/ezarticle/user/smallarticlelist.php" );
    ?>

    <?php
    include( "kernel/ezpoll/user/votebox.php" );
    ?>
    <?php
    include( "kernel/ezsearch/user/menubox.php" );
    ?>

<!-- Right menu end -->

   <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/base/images/design/1x1.gif" width="130" height="20" border="0" alt="" /><br />

   <div align="center"><a class="path" href="?PrintableVersion=enabled">Printable page</a></div><br />

   <div align="center">
   <a target="_blank" href="http://basic.ezpublish.one"><img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/base/images/logo/powered-by-ezpublish-100x35-trans-lgrey.gif" width="90" height="35" border="0" alt="Powered by eZ publish" /></a>
   </div>

   <img src="<?php print $GlobalSiteIni->WWWDir; ?>/design/base/images/design/1x1.gif" width="130" height="8" border="0" alt="" /><br />

   </td>
</tr>
</table>

   </td>
</tr>
</table>

<?php
// Store the statistics with a callback image.
// It will be no overhead with this method for storing stats
//

$StoreStats = $ini->read_var( "eZStatsMain", "StoreStats" );

if ( $StoreStats == "enabled" )
{
    // create a random string to prevent browser caching.
    $seed = md5( microtime() );
    // callback for storing the stats
    $imgSrc = $GlobalSiteIni->WWWDir . "/stats/store/rx$seed-" . $_SERVER['REQUEST_URI']; // . "1x1.gif";
    print( "<img src=\"$imgSrc\" height=\"1\" width=\"1\" border=\"0\" alt=\"\" />" );
}

?>

</body>
</html>