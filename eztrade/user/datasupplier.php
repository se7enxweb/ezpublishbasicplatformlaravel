<?php
//
// $Id: datasupplier.php 9407 2002-04-10 11:49:02Z br $
//
// Created on: <23-Oct-2000 17:53:46 bf>
//
// This source file is part of eZ publish, publishing software.
//
// Copyright (C) 1999-2001 eZ Systems.  All rights reserved.
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, US
//


$PageCaching = $ini->read_var( "eZTradeMain", "PageCaching");


include_once( "ezuser/classes/ezuser.php" );
include_once( "eztrade/classes/ezpricegroup.php" );
include_once( "classes/ezhttptool.php" );

$user =& eZUser::currentUser();
$SiteDesign = $ini->read_var( "site", "SiteDesign" );

$RequireUser = $ini->read_var( "eZTradeMain", "RequireUserLogin" ) == "enabled" ? true : false;
$ShowPrice = $RequireUser ? is_a( $user, "eZUser" ) : true;

$PriceGroup = 0;
if ( is_a( $user, "eZUser" ) )
{
    $PriceGroup = eZPriceGroup::correctPriceGroup( $user->groups( false ) );
}
if ( !$ShowPrice )
    $PriceGroup = -1;

$ini =& INIFile::globalINI();
$GlobalSectionID = $ini->read_var( "eZTradeMain", "DefaultSection" );


$user =& eZUser::currentUser();
if ( $user )
{
    $groupIDArray =& $user->groups( false );
    sort( $groupIDArray );
}

switch ( $url_array[2] )
{
    case "productlist" :
    {
        $CategoryID = $url_array[3];
        $Offset = $url_array[4];
        if ( !is_numeric( $Offset ) )
            $Offset = 0;
        if ( $PageCaching == "enabled" )
        {
            include_once( "classes/ezcachefile.php" );
            $CacheFile = new eZCacheFile( "eztrade/cache/",
                                          array_merge( "productlist", $CategoryID, $groupIDArray, $Offset, $PriceGroup ),
                                          "cache", "," );
            if ( $CacheFile->exists() )
            {
                include( $CacheFile->filename( true ) );
            }
            else
            {
                $GenerateStaticPage = "true";
                include( "eztrade/user/productlist.php" );
            }
        }
        else
        {
            include( "eztrade/user/productlist.php" );
        }
        break;
    }

    case "productview" :
        if ( $PageCaching == "enabled" )
        {
            $ProductID = $url_array[3];
            $CategoryID = $url_array[4];

            include_once( "classes/ezcachefile.php" );
            $CacheFile = new eZCacheFile( "eztrade/cache/",
                                          array_merge( "productview", $ProductID, $groupIDArray, $PriceGroup ),
                                          "cache", "," );
            if ( $CacheFile->exists() )
            {
                include( $CacheFile->filename( true ) );
            }
            else
            {
                $GenerateStaticPage = "true";
                include( "eztrade/user/productview.php" );
            }
        }
        else
        {
            $ProductID = $url_array[3];
            $CategoryID = $url_array[4];
            include( "eztrade/user/productview.php" );
        }

        break;

    case "print" :
    case "productprint" :
        if ( $PageCaching == "enabled" )
        {
            $PrintableVersion = "enabled";
            $ProductID = $url_array[3];
            $CategoryID = $url_array[4];

            include_once( "classes/ezcachefile.php" );
            $CacheFile = new eZCacheFile( "eztrade/cache/",
                                          array_merge( "productprint", $ProductID, $groupIDArray, $PriceGroup ),
                                          "cache", "," );
            if ( $CacheFile->exists() )
            {
                include( $CacheFile->filename( true ) );
            }
            else
            {
                $GenerateStaticPage = "true";
                include( "eztrade/user/productview.php" );
            }
        }
        else
        {
            $PrintableVersion = "enabled";
            $ProductID = $url_array[3];
            $CategoryID = $url_array[4];
            include( "eztrade/user/productview.php" );
        }

        break;

    case "cart" :
    {
        if ( $url_array[3] == "add" )
        {
            $Action = "AddToBasket";
            $ProductID = $url_array[4];
        }

        if ( $url_array[3] == "remove" )
        {
            $Action = "RemoveFromBasket";
            $CartItemID = $url_array[4];
        }

        if ( isset( $WishList ) )
        {
            include( "eztrade/user/wishlist.php" );

//               eZHTTPTool::header( "Location: /trade/wishlist/add/$ProductID" );
//              exit();
        }
        else
        {
            include( "eztrade/user/cart.php" );
        }
    }
        break;

    case "wishlist" :
    {
        if ( $url_array[3] == "add" )
        {
            $Action = "AddToBasket";
            $ProductID = $url_array[4];
        }

        if ( $url_array[3] == "movetocart" )
        {
            $Action = "MoveToCart";
            $WishListItemID = $url_array[4];
        }

        if ( $url_array[3] == "remove" )
        {
            $Action = "RemoveFromWishlist";
            $WishListItemID = $url_array[4];
        }

        include( "eztrade/user/wishlist.php" );
    }
    break;

    case "viewwishlist" :
    {
        if ( $url_array[3] == "movetocart" )
        {
            $Action = "MoveToCart";
            $WishListItemID = $url_array[4];
        }

        include( "eztrade/user/viewwishlist.php" );
    }
    break;

    case "sendwishlist" :
    {
        include( "eztrade/user/sendwishlist.php" );
    }
    break;

    case "voucherview" :
    {
        include( "eztrade/user/voucherview.php" );
    }
    break;

    case "vouchermain" :
    {
        include( "eztrade/user/vouchermain.php" );
    }
    break;

    case "voucheremailsample" :
    {
        include( "eztrade/user/voucheremailsample.php" );
    }
    break;

    case "orderview" :
    {
        $OrderID = $url_array[3];
        include( "eztrade/user/orderview.php" );
    }
    break;

    case "findwishlist" :
    {
        include( "eztrade/user/findwishlist.php" );
    }
    break;

    case "customerlogin" :
        include( "eztrade/user/customerlogin.php" );
        break;

    case "precheckout" :
    {
        include( "eztrade/user/precheckout.php" );
    }
    break;

    case "checkout" :
    {
        include( "eztrade/user/checkout.php" );
    }
    break;

    case "payment" :
    {
        include( "eztrade/user/payment.php" );
    }
    break;

	case "paypal" :
    {
        $orderID = $url_array[3];
        $sessionID = $url_array[4];
        include( "eztrade/user/paypalnotify.php" );

    }
    break;

    case "confirmation" :
    {
        include( "eztrade/user/confirmation.php" );
    }
    break;

    case "voucherinformation" :
    {
        $ProductID = $url_array[3];
        $PriceRange = $url_array[4];
        $MailMethod = $url_array[5];

        include( "eztrade/user/voucherinformation.php" );
    }
    break;

    case "ordersendt" :
    {
        $OrderID = $url_array[3];
        include( "eztrade/user/ordersendt.php" );
    }
    break;

    case "search" :
    {
        if ( $url_array[3] == "move" )
        {
            $Query = urldecode( $url_array[4] );
            $Offset = urldecode ( $url_array[5] );
        }
        include( "eztrade/user/productsearch.php" );
    }
    break;

    case "orderlist" :
    {
        if ( $url_array[3] != "" )
            $Offset = $url_array[3];
        else
            $Offset = 0;

        include( "eztrade/user/orderlist.php" );
    }
    break;


    case "extendedsearch" :
    {
        $Limit = 10;
        if ( $url_array[3] == "move" )
        {
            $Text = urldecode( $url_array[4] );
            $PriceRange = urldecode( $url_array[5] );
            $MainCategories = urldecode ( $url_array[6] );
            $CategoryArray = urldecode ( $url_array[7] );
            $Offset = urldecode ( $url_array[8] );

            $Action = "SearchButton";
            $Next = true;
        }

        include( "eztrade/user/extendedsearch.php" );
    }
    break;

    // XML rpc interface
    case "xmlrpc" :
    {
        include( "eztrade/xmlrpc/xmlrpcserver.php" );
    }
    break;

    // XML rpc interface
    case "xmlrpcimport" :
    {
        include( "eztrade/xmlrpc/xmlrpcserverimport.php" );
    }
    break;


    default :
    {
        eZHTTPTool::header( "Location: /error/404" );
        exit();
    }
        break;
}

?>
