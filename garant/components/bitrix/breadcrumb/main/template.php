<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
    return "";

$strReturn = '<ol class="breadcrumb">';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($index == $itemSize - 1) {
        $active = ' class="span"';
    } else {
        $active = '';
    }

    if($arResult[$index]["LINK"] <> "")
    {
        if ($active)
        {
            $strReturn .= '<li><span ' . $active . '>' . $title . '</span></li>';
        } else
        {
            $strReturn .= '<li><a class="a" href="' . $arResult[$index]["LINK"] . '">' . $title . '</a></li>';
        }
    }
    else
        $strReturn .= '<li><span '.$active.'>'.$title.'</span></li>';
}

$strReturn .= '</ol>';
return $strReturn;
?>
