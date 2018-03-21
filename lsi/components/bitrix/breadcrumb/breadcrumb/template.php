<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string

if(empty($arResult) || \Intervolga\Custom\SiteTools::isIndex() || ERROR_404 == 'Y')
    return "";

$strReturn = '<ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($index == $itemSize - 1) {
        //$strReturn .=  '<li class="breadcrumb__active active">'.$title.'</li>';
    } else {
    	if(!(array_key_exists($index+1, $arResult) && $arResult[$index]["TITLE"] == $arResult[$index+1]["TITLE"]))
	    {
		    $strReturn .=  '<li class="breadcrumb__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">';
		    $strReturn .=  '<a class="breadcrumb__link" href="'.$arResult[$index]["LINK"].'" itemprop="item">';
		    $strReturn .=  '<span itemprop="name">'.$title.'</span><meta itemprop="position" content="' . ($index + 1) .'">';
		    $strReturn .=  '</a>';
		    $strReturn .=  '</li>';
	    }
    }
}

$strReturn .= '</ol>';
return $strReturn;
