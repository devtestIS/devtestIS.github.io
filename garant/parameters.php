<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * Use this class to access parameters.
 *
 * @see \Intervolga\Common\TemplateParameters
 */
$templateParameters = array(
	"resize" => array(
		"*" => array(
			"height" => 1000,
			"width" => 1000,
			"resize_type" => BX_RESIZE_IMAGE_EXACT,
			"default" => "/local/templates/main/img/noimage-1000x1000.png",
		),
        "news_list_partners" => array(
            "height" => 80,
            "width" => 100,
            "permit_extensions" => true,
            "resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
            "src" => "/local/templates/main/img/nophoto-100x80.png"
        ),
        "news_list_slider_detail" => array(
            "height" => 1068,
            "width" => 2500,
            "permit_extensions" => true,
            "resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
			"src" => "/local/templates/main/img/nophoto-2500x1068.png"
        ),
		"news_list_slider_preview" => array(
			"height" => 700,
			"width" => 780,
			"permit_extensions" => true,
			"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
			"src" => "/local/templates/main/img/nophoto-780x700.png",
		),
		"catalog_section_offers" => array(
			"height" => 80,
			"width" => 150,
			"permit_extensions" => true,
			"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
			"src" => "/local/templates/main/img/nophoto-150x80.png"
		),
		"catalog_section_offers_main" => array(
			"height" => 80,
			"width" => 150,
			"permit_extensions" => true,
			"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
			"src" => "/local/templates/main/img/nophoto-150x80.png"
		),
		"catalog_offers_catalog_element_offer" => array(
			"height" => 80,
			"width" => 150,
			"permit_extensions" => true,
			"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
			"src" => "/local/templates/main/img/nophoto-150x80.png"
		),
		"catalog_offers_catalog_element_images" => array(
			"height" => 250,
			"width" => 400,
			"permit_extensions" => true,
			"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
			"src" => ""
		),
		"main_profile_default_company_images" => array(
			"height" => 80,
			"width" => 80,
			"permit_extensions" => true,
			"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
			"src" => ""
		),
		"main_profile_default_offers_images" => array(
			"height" => 80,
			"width" => 80,
			"permit_extensions" => true,
			"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
			"src" => ""
		),
	),
);