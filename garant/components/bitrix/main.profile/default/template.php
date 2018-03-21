<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?use Intervolga\Custom\Iblock\Company;?>
<?use Intervolga\Custom\Iblock\Offer;?>

<? $this->SetViewTarget('header-control-panel'); ?>
	<button class="settings" type="button" data-toggle="modal" data-target="#changePassword"><i class="icomoon mrs icon icon-settings"></i><?= GetMessage('MAIN_PROFILE_DEFAULT_OPTIONS')?></button>
<? $this->EndViewTarget(); ?>

<?if (!$arResult['IS_MODERATOR']):?>
	<?$arCompany = $arResult['ELEMENTS']['COMPANIES'][0];?>
	<?if ($arCompany):?>
		<div class="company thumbnails">
			<div class="row"><span class="personal-title"><?= GetMessage('MAIN_PROFILE_DEFAULT_MY_COMPANY')?></span><?if ($arCompany['PROPERTIES']['COMMENT']['VALUE']):?><span class="personal-title personal-title_size_small"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_MODERATOR_COMMENT')?></span><?endif;?><?if ($arCompany['PROPERTIES']['COMMENT']['VALUE']):?><?= $arCompany['PROPERTIES']['COMMENT']['VALUE']?><?endif;?>
				<h2 class="company__name"><?= $arCompany['NAME']?><?$APPLICATION->IncludeComponent(
						"intervolga.custom:ajax.component-company",
						"company-edit",
						Array(
							"COMPONENT" => "intervolga.common:iblock.element.add.form",
							"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
							"COMPONENT_SECTION_1" => "intervolga.common",
							"COMPONENT_SECTION_2" => "FREE",
							"ID" => "company-edit",
							"INNER_BUTTON_TEXT" => "",
							"INNER_CODE" => "",
							"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
							"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
							"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
							"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
							"INNER_CUSTOM_TITLE_FIELD_ACTIVE_FROM" => "",
							"INNER_CUSTOM_TITLE_FIELD_ACTIVE_TO" => "",
							"INNER_CUSTOM_TITLE_FIELD_CODE" => "",
							"INNER_CUSTOM_TITLE_FIELD_DETAIL_PICTURE" => "",
							"INNER_CUSTOM_TITLE_FIELD_DETAIL_TEXT" => GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_EDIT_DESCRIPTION'),
							"INNER_CUSTOM_TITLE_FIELD_IBLOCK_SECTION" => GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_EDIT_RUBRICS'),
							"INNER_CUSTOM_TITLE_FIELD_NAME" => "",
							"INNER_CUSTOM_TITLE_FIELD_PREVIEW_PICTURE" => "",
							"INNER_CUSTOM_TITLE_FIELD_PREVIEW_TEXT" => GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_EDIT_ANOUNCE'),
							"INNER_CUSTOM_TITLE_FIELD_TAGS" => "",
							"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
							"INNER_CUSTOM_TITLE_NAME" => "",
							"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
							"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_ACCEPT_MODERATION" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_ADDITIONAL_DESCRIPTION" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_ADDRESS" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_CITY" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_COMMENT" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_CONTACT_FACE" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_EMAIL" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_IMAGES" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_INN" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_MODERATOR" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_OFFERS" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_PHONE" => "",
							"INNER_CUSTOM_TITLE_PROPERTY_SITE" => "",
							"INNER_CUSTOM_TITLE_TAGS" => "",
							"INNER_DEFAULT_INPUT_SIZE" => "30",
							"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
							"INNER_ELEMENT_ASSOC" => "PROPERTY_ID",
							"INNER_ELEMENT_ASSOC_PROPERTY" => "33",
							"INNER_FORM_ID" => "",
							"INNER_GROUPS" => array("1", "5"),
							"INNER_IBLOCK_CODE" => INTERVOLGA_CUSTOM_IBLOCK_CATALOG_COMPANY_CODE,
							"INNER_IBLOCK_ID" => Company::getIblockId(),
							"INNER_IBLOCK_TYPE" => "catalog",
							"INNER_ID" => $arCompany['ID'],
							"INNER_LEVEL_LAST" => "Y",
							"INNER_LIST_URL" => "",
							"INNER_MAX_FILE_SIZE" => "0",
							"INNER_MAX_LEVELS" => "100000",
							"INNER_MAX_USER_ENTRIES" => "100000",
							"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"INNER_PROPERTY_CODES" => array("FIELD_NAME", "FIELD_PREVIEW_TEXT", "FIELD_IBLOCK_SECTION", "FIELD_DETAIL_TEXT", "PROPERTY_ADDITIONAL_DESCRIPTION", "PROPERTY_IMAGES", "PROPERTY_CITY", "PROPERTY_ADDRESS", "PROPERTY_SITE", "PROPERTY_EMAIL", "PROPERTY_CONTACT_FACE", "PROPERTY_PHONE", "PROPERTY_INN"),
							"INNER_PROPERTY_CODES_HIDDEN" => array(),
							"INNER_PROPERTY_CODES_REQUIRED" => array("FIELD_NAME"),
							"INNER_RESIZE_IMAGES" => "N",
							"INNER_SEF_FOLDER" => "",
							"INNER_SEF_MODE" => "N",
							"INNER_SORT_FIELD_ACTIVE_FROM" => "",
							"INNER_SORT_FIELD_ACTIVE_TO" => "",
							"INNER_SORT_FIELD_CODE" => "",
							"INNER_SORT_FIELD_DETAIL_PICTURE" => "",
							"INNER_SORT_FIELD_DETAIL_TEXT" => "",
							"INNER_SORT_FIELD_IBLOCK_SECTION" => "",
							"INNER_SORT_FIELD_NAME" => "",
							"INNER_SORT_FIELD_PREVIEW_PICTURE" => "",
							"INNER_SORT_FIELD_PREVIEW_TEXT" => "",
							"INNER_SORT_FIELD_TAGS" => "",
							"INNER_SORT_PROPERTY_ACCEPT_MODERATION" => "",
							"INNER_SORT_PROPERTY_ADDITIONAL_DESCRIPTION" => "",
							"INNER_SORT_PROPERTY_ADDRESS" => "",
							"INNER_SORT_PROPERTY_CITY" => "",
							"INNER_SORT_PROPERTY_COMMENT" => "",
							"INNER_SORT_PROPERTY_CONTACT_FACE" => "",
							"INNER_SORT_PROPERTY_EMAIL" => "",
							"INNER_SORT_PROPERTY_IMAGES" => "",
							"INNER_SORT_PROPERTY_INN" => "",
							"INNER_SORT_PROPERTY_MODERATOR" => "",
							"INNER_SORT_PROPERTY_OFFERS" => "",
							"INNER_SORT_PROPERTY_PHONE" => "",
							"INNER_SORT_PROPERTY_SITE" => "",
							"INNER_STATUS" => "ANY",
							"INNER_STATUS_NEW" => "N",
							"INNER_USER_MESSAGE_ADD" => GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_EDIT_MESSAGE_ADD'),
							"INNER_USER_MESSAGE_EDIT" => GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_EDIT_MESSAGE_SAVE'),
							"INNER_USE_CAPTCHA" => "N",
							"INNER_USE_CUSTOM_TITLES" => "Y",
							"INNER_USE_DEFAULTS" => "N",
							"INNER_USE_SORT" => "Y",
							"INNER_XML_ID" => "",
							"SHOW_BUTTON" => "Y",
							"SIZE" => "",
							"TEMPLATE" => "main:modal-company-edit",
							"TITLE" => GetMessage('MAIN_PROFILE_DEFAULT_EDIT')
						)
					);?></h2>
				<div class="col-xs-6">
					<div class="company__property">
						<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_RUBRICS')?></h3>
						<div class="company__value" data-tags>
							<?$index = 0;?>
							<?$lastIndex = count($arResult['RUBRICS']['COMPANIES'][$arCompany['ID']]) - 1;?>
							<?foreach ($arResult['RUBRICS']['COMPANIES'][$arCompany['ID']] as $arRubric):?>
								<a class="a" href="<?= $arRubric['SECTION_PAGE_URL']?>"><?= $arRubric['NAME']?><?if ($index != $lastIndex):?>, <?endif;?></a>
								<?$index++;?>
							<?endforeach;?>
						</div>
					</div>
					<div class="company__property">
						<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_IMAGES')?></h3>
						<div class="company__value">
							<div class="thumbnails-gallery">
								<?foreach($arCompany['PROPERTIES']['IMAGES']['VALUE'] as $imageID):?>
									<?if (key_exists($imageID, $arResult['IMAGES']['COMPANIES'])):?>
										<figure class="thumbnails-gallery__item"><img class="thumbnails-gallery__image" src="<?= $arResult['IMAGES']['COMPANIES'][$imageID]['SRC']?>" /></figure>
									<?endif;?>
								<?endforeach;?>
							</div>
						</div>
					</div>
					<div class="company__property">
						<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_ANOUNCE')?></h3>
						<div class="company__value"><?if ($arCompany['DETAIL_TEXT']):?><?= $arCompany['DETAIL_TEXT']?><?endif;?></div>
					</div>
					<div class="company__property">
						<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_DESCRIPTION')?></h3>
						<div class="company__value">
							<div class="scrollbar-inner"><?if ($arCompany['PREVIEW_TEXT']):?><?= $arCompany['PREVIEW_TEXT']?><?endif;?></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<?foreach ($arCompany['PROPERTIES'] as $arProperty):?>
						<?if (in_array($arProperty['CODE'], $arResult['PRINT_PROPERTIES'])):?>
							<div class="company__property">
								<h3 class="company__subheading"><?= $arProperty['NAME']?></h3>
								<div class="company__value"><?if ($arProperty['VALUE']):?><?= $arProperty['VALUE']?><?endif;?></div>
							</div>
						<?endif;?>
					<?endforeach;?>
				</div>
			</div>
		</div>
		<?$APPLICATION->ShowViewContent('company_edit')?>
		<div class="company thumbnails">
			<div class="offers-heading clearfix"><span class="personal-title pull-left"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS')?></span><?$APPLICATION->IncludeComponent(
				"intervolga.custom:ajax.component-company",
				"offer-add",
				Array(
					"COMPONENT" => "intervolga.common:iblock.element.add.form",
					"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
					"COMPONENT_SECTION_1" => "intervolga.common",
					"COMPONENT_SECTION_2" => "FREE",
					"ID" => "offeradd",
					"INNER_BUTTON_TEXT" => "",
					"INNER_CODE" => "",
					"INNER_COMPANY_ID" => $arCompany['ID'],
					"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
					"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
					"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
					"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
					"INNER_CUSTOM_TITLE_FIELD_ACTIVE_FROM" => "",
					"INNER_CUSTOM_TITLE_FIELD_ACTIVE_TO" => "",
					"INNER_CUSTOM_TITLE_FIELD_CODE" => "",
					"INNER_CUSTOM_TITLE_FIELD_DETAIL_PICTURE" => "",
					"INNER_CUSTOM_TITLE_FIELD_DETAIL_TEXT" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_ADD_DESCRIPTION'),
					"INNER_CUSTOM_TITLE_FIELD_IBLOCK_SECTION" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_ADD_RUBRICS'),
					"INNER_CUSTOM_TITLE_FIELD_NAME" => "",
					"INNER_CUSTOM_TITLE_FIELD_PREVIEW_PICTURE" => "",
					"INNER_CUSTOM_TITLE_FIELD_PREVIEW_TEXT" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_ADD_ANOUNCE'),
					"INNER_CUSTOM_TITLE_FIELD_TAGS" => "",
					"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
					"INNER_CUSTOM_TITLE_NAME" => "",
					"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
					"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_ACCEPT_MODERATION" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_ADDITIONAL_DESCRIPTION" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_ADDRESS" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_CITY" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_COMMENT" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_CONTACT_FACE" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_EMAIL" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_IMAGES" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_INN" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_MODERATOR" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_OFFERS" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_PHONE" => "",
					"INNER_CUSTOM_TITLE_PROPERTY_SITE" => "",
					"INNER_CUSTOM_TITLE_TAGS" => "",
					"INNER_DEFAULT_INPUT_SIZE" => "30",
					"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
					"INNER_ELEMENT_ASSOC" => "PROPERTY_ID",
					"INNER_ELEMENT_ASSOC_PROPERTY" => "33",
					"INNER_FORM_ID" => "",
					"INNER_GROUPS" => array("1", "5"),
					"INNER_IBLOCK_CODE" => INTERVOLGA_CUSTOM_IBLOCK_CATALOG_OFFERS_CODE,
					"INNER_IBLOCK_ID" => Offer::getIblockId(),
					"INNER_IBLOCK_TYPE" => "catalog",
					"INNER_ID" => "",
					"INNER_LEVEL_LAST" => "Y",
					"INNER_LIST_URL" => "",
					"INNER_MAX_FILE_SIZE" => "0",
					"INNER_MAX_LEVELS" => "100000",
					"INNER_MAX_USER_ENTRIES" => "100000",
					"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
					"INNER_PROPERTY_CODES" => array("FIELD_NAME", "FIELD_PREVIEW_TEXT", "FIELD_IBLOCK_SECTION", "FIELD_DETAIL_TEXT", "PROPERTY_ADDITIONAL_DESCRIPTION", "PROPERTY_IMAGES", "PROPERTY_COMPANY", "PROPERTY_EMAIL"),
					"INNER_PROPERTY_CODES_HIDDEN" => array("PROPERTY_COMPANY"),
					"INNER_PROPERTY_CODES_REQUIRED" => array("FIELD_NAME"),
					"INNER_RESIZE_IMAGES" => "N",
					"INNER_SEF_FOLDER" => "",
					"INNER_SEF_MODE" => "N",
					"INNER_SORT_FIELD_ACTIVE_FROM" => "",
					"INNER_SORT_FIELD_ACTIVE_TO" => "",
					"INNER_SORT_FIELD_CODE" => "",
					"INNER_SORT_FIELD_DETAIL_PICTURE" => "",
					"INNER_SORT_FIELD_DETAIL_TEXT" => "300",
					"INNER_SORT_FIELD_IBLOCK_SECTION" => "50",
					"INNER_SORT_FIELD_NAME" => "",
					"INNER_SORT_FIELD_PREVIEW_PICTURE" => "",
					"INNER_SORT_FIELD_PREVIEW_TEXT" => "100",
					"INNER_SORT_FIELD_TAGS" => "",
					"INNER_SORT_PROPERTY_ACCEPT_MODERATION" => "",
					"INNER_SORT_PROPERTY_ADDITIONAL_DESCRIPTION" => "400",
					"INNER_SORT_PROPERTY_ADDRESS" => "",
					"INNER_SORT_PROPERTY_CITY" => "",
					"INNER_SORT_PROPERTY_COMMENT" => "",
					"INNER_SORT_PROPERTY_CONTACT_FACE" => "",
					"INNER_SORT_PROPERTY_EMAIL" => "",
					"INNER_SORT_PROPERTY_IMAGES" => "200",
					"INNER_SORT_PROPERTY_INN" => "",
					"INNER_SORT_PROPERTY_MODERATOR" => "",
					"INNER_SORT_PROPERTY_OFFERS" => "",
					"INNER_SORT_PROPERTY_PHONE" => "",
					"INNER_SORT_PROPERTY_SITE" => "",
					"INNER_STATUS" => "ANY",
					"INNER_STATUS_NEW" => "N",
					"INNER_USER_MESSAGE_ADD" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_ADD_MESSAGE_ADD'),
					"INNER_USER_MESSAGE_EDIT" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_ADD_MESSAGE_SAVE'),
					"INNER_USE_CAPTCHA" => "N",
					"INNER_USE_CUSTOM_TITLES" => "Y",
					"INNER_USE_DEFAULTS" => "N",
					"INNER_USE_SORT" => "Y",
					"INNER_XML_ID" => "",
					"SHOW_BUTTON" => "Y",
					"SIZE" => "",
					"TEMPLATE" => "main:modal-company-edit",
					"TITLE" => GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ADD')
				)
			);?></div>
			<?$APPLICATION->ShowViewContent('offer_add')?>
			<div class="row">
				<div class="col-xs-6">
					<div class="thumbnails">
						<h5 class="h"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_AWAITING_MODERATION_USER')?></h5>
						<?foreach ($arResult['ELEMENTS']['OFFERS'] as $arOffer):?>
							<?if (!$arOffer['PROPERTIES']['COMMENT']['VALUE'] && !$arOffer['PROPERTIES']['ACCEPT_MODERATION']['VALUE']):?>
								<div class="collapse-section"><button class="collapse-section__title" type="button" data-toggle="collapse" data-target="#collapse-<?= $arOffer['ID']?>" aria-expanded="false"><span><?= $arOffer['NAME']?></span><a class="change-button" href="javascript:void(0);" data-offer-edit-id="<?= $arOffer['ID']?>" data-target="#offeredit"><?= GetMessage('MAIN_PROFILE_DEFAULT_EDIT')?></a><a class="change-button" href="javascript:void(0);" data-offer-remove-id="<?= $arOffer['ID']?>"><?= GetMessage('MAIN_PROFILE_DEFAULT_REMOVE')?></a><i class="icomoon icon icon-arrow-expand"></i></button>
									<div
										class="collapse-section__content collapse" id="collapse-<?= $arOffer['ID']?>">
										<div class="company"><?if ($arOffer['ACTIVE_TO']):?><span class="company__time"><?= GetMessage('MAIN_PROFILE_DEFAULT_ACTIVE_DATE_OFFER')?><a href="javascript:void(0);"><?= date('d.m.Y', strtotime($arOffer['ACTIVE_TO']))?></a></span><?endif;?>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_RUBRICS')?></h3>
												<div class="company__value">
													<?$index = 0;?>
													<?$lastIndex = count($arResult['RUBRICS']['OFFERS'][$arOffer['ID']]) - 1;?>
													<?foreach ($arResult['RUBRICS']['OFFERS'][$arOffer['ID']] as $arRubric):?>
														<a class="a" href="<?= $arRubric['SECTION_PAGE_URL']?>"><?= $arRubric['NAME']?><?if ($index != $lastIndex):?>, <?endif;?></a>
														<?$index++;?>
													<?endforeach;?>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ANOUNCE')?></h3>
												<div class="company__value"><?if ($arOffer['PREVIEW_TEXT']):?><?= $arOffer['PREVIEW_TEXT']?><?endif;?></div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_DESCRIPTION')?></h3>
												<div class="company__value">
													<div class="scrollbar-inner"><?if ($arOffer['DETAIL_TEXT']):?><?= $arOffer['DETAIL_TEXT']?><?endif;?></div>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ADDITIONAL_DESCRIPTION')?></h3>
												<div class="company__value">
													<div class="scrollbar-inner"><?if ($arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']):?><?= $arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']?><?endif;?></div>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_IMAGES')?></h3>
												<div class="company__value">
													<div class="thumbnails-gallery">
														<?foreach($arOffer['PROPERTIES']['IMAGES']['VALUE'] as $imageID):?>
															<?if (key_exists($imageID, $arResult['IMAGES']['OFFERS'])):?>
																<figure class="thumbnails-gallery__item"><img class="thumbnails-gallery__image" src="<?= $arResult['IMAGES']['OFFERS'][$imageID]['SRC']?>" /></figure>
															<?endif;?>
														<?endforeach;?>
													</div>
												</div>
											</div>
											<div class="company__property">
												<h6 class="h text-nowrap company__mail-title" style="white-space: normal;"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_OFFERS_EMAIL')?></h6><a class="company__email" href="<?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?>mailto:<?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?>"><?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?><?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?></a></div>
										</div>
									</div>
								</div>
							<?endif;?>
						<?endforeach;?>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="thumbnails">
						<h5 class="h"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_DECLINED_MODERATION_USER')?></h5>
						<?foreach ($arResult['ELEMENTS']['OFFERS'] as $arOffer):?>
							<?if ($arOffer['PROPERTIES']['COMMENT']['VALUE'] && !$arOffer['PROPERTIES']['ACCEPT_MODERATION']['VALUE']):?>
								<div class="collapse-section"><button class="collapse-section__title" type="button" data-toggle="collapse" data-target="#collapse-<?= $arOffer['ID']?>" aria-expanded="false"><span><?= $arOffer['NAME']?></span><a class="change-button" href="javascript:void(0);" data-offer-edit-id="<?= $arOffer['ID']?>" data-target="#offeredit"><?= GetMessage('MAIN_PROFILE_DEFAULT_EDIT')?></a><a class="change-button" href="javascript:void(0);" data-offer-remove-id="<?= $arOffer['ID']?>"><?= GetMessage('MAIN_PROFILE_DEFAULT_REMOVE')?></a><i class="icomoon icon icon-arrow-expand"></i></button>
									<div
										class="collapse-section__content collapse" id="collapse-<?= $arOffer['ID']?>"><?if ($arOffer['PROPERTIES']['COMMENT']['VALUE']):?><span class="personal-title personal-title_size_small"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_MODERATOR_COMMENT')?></span><?endif;?><?if ($arOffer['PROPERTIES']['COMMENT']['VALUE']):?><?= $arOffer['PROPERTIES']['COMMENT']['VALUE']?><?endif;?>
										<div class="company"><?if ($arOffer['ACTIVE_TO']):?><span class="company__time"><?= GetMessage('MAIN_PROFILE_DEFAULT_ACTIVE_DATE_OFFER')?><a href="javascript:void(0);"><?= date('d.m.Y', strtotime($arOffer['ACTIVE_TO']))?></a></span><?endif;?>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_RUBRICS')?></h3>
												<div class="company__value">
													<?$index = 0;?>
													<?$lastIndex = count($arResult['RUBRICS']['OFFERS'][$arOffer['ID']]) - 1;?>
													<?foreach ($arResult['RUBRICS']['OFFERS'][$arOffer['ID']] as $arRubric):?>
														<a class="a" href="<?= $arRubric['SECTION_PAGE_URL']?>"><?= $arRubric['NAME']?><?if ($index != $lastIndex):?>, <?endif;?></a>
														<?$index++;?>
													<?endforeach;?>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ANOUNCE')?></h3>
												<div class="company__value"><?if ($arOffer['PREVIEW_TEXT']):?><?= $arOffer['PREVIEW_TEXT']?><?endif;?></div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_DESCRIPTION')?></h3>
												<div class="company__value">
													<div class="scrollbar-inner"><?if ($arOffer['DETAIL_TEXT']):?><?= $arOffer['DETAIL_TEXT']?><?endif;?></div>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ADDITIONAL_DESCRIPTION')?></h3>
												<div class="company__value">
													<div class="scrollbar-inner"><?if ($arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']):?><?= $arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']?><?endif;?></div>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_IMAGES')?></h3>
												<div class="company__value">
													<div class="thumbnails-gallery">
														<?foreach($arOffer['PROPERTIES']['IMAGES']['VALUE'] as $imageID):?>
															<?if (key_exists($imageID, $arResult['IMAGES']['OFFERS'])):?>
																<figure class="thumbnails-gallery__item"><img class="thumbnails-gallery__image" src="<?= $arResult['IMAGES']['OFFERS'][$imageID]['SRC']?>" /></figure>
															<?endif;?>
														<?endforeach;?>
													</div>
												</div>
											</div>
											<div class="company__property">
												<h6 class="h text-nowrap company__mail-title" style="white-space: normal;"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_OFFERS_EMAIL')?></h6><a class="company__email" href="<?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?>mailto:<?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?>"><?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?><?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?></a></div>
										</div>
									</div>
								</div>
							<?endif;?>
						<?endforeach;?>
					</div>
				</div>
			</div>
			<div class="row row-margin">
				<div class="col-xs-6">
					<div class="thumbnails">
						<h5 class="h"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ACCEPTED_MODERATION_USER')?></h5>
						<?foreach ($arResult['ELEMENTS']['OFFERS'] as $arOffer):?>
							<?if ($arOffer['PROPERTIES']['ACCEPT_MODERATION']['VALUE']):?>
								<div class="collapse-section"><button class="collapse-section__title" type="button" data-toggle="collapse" data-target="#collapse-<?= $arOffer['ID']?>" aria-expanded="false"><span><?= $arOffer['NAME']?></span><a class="change-button" href="javascript:void(0);" data-offer-edit-id="<?= $arOffer['ID']?>" data-target="#offeredit"><?= GetMessage('MAIN_PROFILE_DEFAULT_EDIT')?></a><a class="change-button" href="javascript:void(0);" data-offer-remove-id="<?= $arOffer['ID']?>"><?= GetMessage('MAIN_PROFILE_DEFAULT_REMOVE')?></a><i class="icomoon icon icon-arrow-expand"></i></button>
									<div
										class="collapse-section__content collapse" id="collapse-<?= $arOffer['ID']?>">
										<div class="company"><?if ($arOffer['ACTIVE_TO']):?><span class="company__time"><?= GetMessage('MAIN_PROFILE_DEFAULT_ACTIVE_DATE_OFFER')?><a href="javascript:void(0);"><?= date('d.m.Y', strtotime($arOffer['ACTIVE_TO']))?></a></span><?endif;?>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_RUBRICS')?></h3>
												<div class="company__value">
													<?$index = 0;?>
													<?$lastIndex = count($arResult['RUBRICS']['OFFERS'][$arOffer['ID']]) - 1;?>
													<?foreach ($arResult['RUBRICS']['OFFERS'][$arOffer['ID']] as $arRubric):?>
														<a class="a" href="<?= $arRubric['SECTION_PAGE_URL']?>"><?= $arRubric['NAME']?><?if ($index != $lastIndex):?>, <?endif;?></a>
														<?$index++;?>
													<?endforeach;?>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ANOUNCE')?></h3>
												<div class="company__value"><?if ($arOffer['PREVIEW_TEXT']):?><?= $arOffer['PREVIEW_TEXT']?><?endif;?></div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_DESCRIPTION')?></h3>
												<div class="company__value">
													<div class="scrollbar-inner"><?if ($arOffer['DETAIL_TEXT']):?><?= $arOffer['DETAIL_TEXT']?><?endif;?></div>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ADDITIONAL_DESCRIPTION')?></h3>
												<div class="company__value">
													<div class="scrollbar-inner"><?if ($arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']):?><?= $arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']?><?endif;?></div>
												</div>
											</div>
											<div class="company__property">
												<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_IMAGES')?></h3>
												<div class="company__value">
													<div class="thumbnails-gallery">
														<?foreach($arOffer['PROPERTIES']['IMAGES']['VALUE'] as $imageID):?>
															<?if (key_exists($imageID, $arResult['IMAGES']['OFFERS'])):?>
																<figure class="thumbnails-gallery__item"><img class="thumbnails-gallery__image" src="<?= $arResult['IMAGES']['OFFERS'][$imageID]['SRC']?>" /></figure>
															<?endif;?>
														<?endforeach;?>
													</div>
												</div>
											</div>
											<div class="company__property">
												<h6 class="h text-nowrap company__mail-title" style="white-space: normal;"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_OFFERS_EMAIL')?></h6><a class="company__email" href="<?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?>mailto:<?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?>"><?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?><?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?></a></div>
										</div>
									</div>
								</div>
							<?endif;?>
						<?endforeach;?>
					</div>
				</div>
			</div>
		</div>
		<?$APPLICATION->ShowViewContent('offer_edit')?>
		<?$APPLICATION->IncludeComponent(
			"intervolga.custom:ajax.component-company",
			"offer-edit",
			Array(
				"COMPONENT" => "intervolga.common:iblock.element.add.form",
				"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
				"COMPONENT_SECTION_1" => "intervolga.common",
				"COMPONENT_SECTION_2" => "FREE",
				"ID" => "offeredit",
				"INNER_BUTTON_TEXT" => "",
				"INNER_CODE" => "",
				"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
				"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
				"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
				"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
				"INNER_CUSTOM_TITLE_FIELD_ACTIVE_FROM" => "",
				"INNER_CUSTOM_TITLE_FIELD_ACTIVE_TO" => "",
				"INNER_CUSTOM_TITLE_FIELD_CODE" => "",
				"INNER_CUSTOM_TITLE_FIELD_DETAIL_PICTURE" => "",
				"INNER_CUSTOM_TITLE_FIELD_DETAIL_TEXT" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_EDIT_DESCRIPTION'),
				"INNER_CUSTOM_TITLE_FIELD_IBLOCK_SECTION" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_EDIT_RUBRICS'),
				"INNER_CUSTOM_TITLE_FIELD_NAME" => "",
				"INNER_CUSTOM_TITLE_FIELD_PREVIEW_PICTURE" => "",
				"INNER_CUSTOM_TITLE_FIELD_PREVIEW_TEXT" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_EDIT_ANOUNCE'),
				"INNER_CUSTOM_TITLE_FIELD_TAGS" => "",
				"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
				"INNER_CUSTOM_TITLE_NAME" => "",
				"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
				"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_ACCEPT_MODERATION" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_ADDITIONAL_DESCRIPTION" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_ADDRESS" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_CITY" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_COMMENT" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_CONTACT_FACE" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_EMAIL" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_IMAGES" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_INN" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_MODERATOR" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_OFFERS" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_PHONE" => "",
				"INNER_CUSTOM_TITLE_PROPERTY_SITE" => "",
				"INNER_CUSTOM_TITLE_TAGS" => "",
				"INNER_DEFAULT_INPUT_SIZE" => "30",
				"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
				"INNER_ELEMENT_ASSOC" => "PROPERTY_ID",
				"INNER_ELEMENT_ASSOC_PROPERTY" => "33",
				"INNER_FORM_ID" => "",
				"INNER_GROUPS" => array("1", "5"),
				"INNER_IBLOCK_CODE" => INTERVOLGA_CUSTOM_IBLOCK_CATALOG_OFFERS_CODE,
				"INNER_IBLOCK_ID" => Offer::getIblockId(),
				"INNER_IBLOCK_TYPE" => "catalog",
				"INNER_ID" => $_REQUEST['OFFER_ID'],
				"INNER_LEVEL_LAST" => "Y",
				"INNER_LIST_URL" => "",
				"INNER_MAX_FILE_SIZE" => "0",
				"INNER_MAX_LEVELS" => "100000",
				"INNER_MAX_USER_ENTRIES" => "100000",
				"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
				"INNER_PROPERTY_CODES" => array("FIELD_NAME", "FIELD_PREVIEW_TEXT", "FIELD_IBLOCK_SECTION", "FIELD_DETAIL_TEXT", "PROPERTY_ADDITIONAL_DESCRIPTION", "PROPERTY_IMAGES", "PROPERTY_EMAIL"),
				"INNER_PROPERTY_CODES_HIDDEN" => array(),
				"INNER_PROPERTY_CODES_REQUIRED" => array("FIELD_NAME"),
				"INNER_RESIZE_IMAGES" => "N",
				"INNER_SEF_FOLDER" => "",
				"INNER_SEF_MODE" => "N",
				"INNER_SORT_FIELD_ACTIVE_FROM" => "",
				"INNER_SORT_FIELD_ACTIVE_TO" => "",
				"INNER_SORT_FIELD_CODE" => "",
				"INNER_SORT_FIELD_DETAIL_PICTURE" => "",
				"INNER_SORT_FIELD_DETAIL_TEXT" => "300",
				"INNER_SORT_FIELD_IBLOCK_SECTION" => "50",
				"INNER_SORT_FIELD_NAME" => "",
				"INNER_SORT_FIELD_PREVIEW_PICTURE" => "",
				"INNER_SORT_FIELD_PREVIEW_TEXT" => "100",
				"INNER_SORT_FIELD_TAGS" => "",
				"INNER_SORT_PROPERTY_ACCEPT_MODERATION" => "",
				"INNER_SORT_PROPERTY_ADDITIONAL_DESCRIPTION" => "400",
				"INNER_SORT_PROPERTY_ADDRESS" => "",
				"INNER_SORT_PROPERTY_CITY" => "",
				"INNER_SORT_PROPERTY_COMMENT" => "",
				"INNER_SORT_PROPERTY_CONTACT_FACE" => "",
				"INNER_SORT_PROPERTY_EMAIL" => "",
				"INNER_SORT_PROPERTY_IMAGES" => "200",
				"INNER_SORT_PROPERTY_INN" => "",
				"INNER_SORT_PROPERTY_MODERATOR" => "",
				"INNER_SORT_PROPERTY_OFFERS" => "",
				"INNER_SORT_PROPERTY_PHONE" => "",
				"INNER_SORT_PROPERTY_SITE" => "",
				"INNER_STATUS" => "ANY",
				"INNER_STATUS_NEW" => "N",
				"INNER_USER_MESSAGE_ADD" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_EDIT_MESSAGE_ADD'),
				"INNER_USER_MESSAGE_EDIT" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_EDIT_MESSAGE_SAVE'),
				"INNER_USE_CAPTCHA" => "N",
				"INNER_USE_CUSTOM_TITLES" => "Y",
				"INNER_USE_DEFAULTS" => "N",
				"INNER_USE_SORT" => "Y",
				"INNER_XML_ID" => "",
				"SHOW_BUTTON" => "Y",
				"SIZE" => "",
				"TEMPLATE" => "main:modal-company-edit",
				"TITLE" => ""
			)
		);?>
	<?else:?>
		<div class="company thumbnails">
			<div class="alert alert-danger"><?= GetMessage('MAIN_PROFILE_DEFAULT_ACCESS_DENIED')?></div>
		</div>
	<?endif;?>
<?else:?>
<div class="company thumbnails">
	<div class="row">
		<div class="col-xs-6">
			<div class="thumbnails">
				<h5 class="h"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_AWAITING_MODERATION')?></h5>
				<?foreach ($arResult['ELEMENTS']['OFFERS'] as $arOffer):?>
					<?if (!$arOffer['PROPERTIES']['COMMENT']['VALUE'] && $arOffer['PROPERTIES']['COMPANY']['VALUE']):?>
						<div class="collapse-section"><button class="collapse-section__title" type="button" data-toggle="collapse" data-target="#collapse-<?= $arOffer['ID']?>" aria-expanded="false"><span><?= $arOffer['NAME']?></span><a class="change-button" href="javascript:void(0);" data-offer-accept-id="<?= $arOffer['ID']?>"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ACCEPT')?></a><a class="change-button" href="javascript:void(0);" data-offer-decline-id="<?= $arOffer['ID']?>" data-target="#offeredit"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_DECLINE')?></a><i class="icomoon icon icon-arrow-expand"></i></button>
							<div
								class="collapse-section__content collapse" id="collapse-<?= $arOffer['ID']?>">
								<div class="company"><?if ($arOffer['ACTIVE_TO']):?><span class="company__time"><?= GetMessage('MAIN_PROFILE_DEFAULT_ACTIVE_DATE_OFFER')?><a href="javascript:void(0);"><?= date('d.m.Y', strtotime($arOffer['ACTIVE_TO']))?></a></span><?endif;?>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_RUBRICS')?></h3>
										<div class="company__value">
											<?$index = 0;?>
											<?$lastIndex = count($arResult['RUBRICS']['OFFERS'][$arOffer['ID']]) - 1;?>
											<?foreach ($arResult['RUBRICS']['OFFERS'][$arOffer['ID']] as $arRubric):?>
												<a class="a" href="<?= $arRubric['SECTION_PAGE_URL']?>"><?= $arRubric['NAME']?><?if ($index != $lastIndex):?>, <?endif;?></a>
												<?$index++;?>
											<?endforeach;?>
										</div>
									</div>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_IMAGES')?></h3>
										<div class="company__value">
											<div class="thumbnails-gallery">
												<?foreach($arOffer['PROPERTIES']['IMAGES']['VALUE'] as $imageID):?>
													<?if (key_exists($imageID, $arResult['IMAGES']['OFFERS'])):?>
														<figure class="thumbnails-gallery__item"><img class="thumbnails-gallery__image" src="<?= $arResult['IMAGES']['OFFERS'][$imageID]['SRC']?>" /></figure>
													<?endif;?>
												<?endforeach;?>
											</div>
										</div>
									</div>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ANOUNCE')?></h3>
										<div class="company__value"><?if ($arOffer['PREVIEW_TEXT']):?><?= $arOffer['PREVIEW_TEXT']?><?endif;?></div>
									</div>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_DESCRIPTION')?></h3>
										<div class="company__value">
											<div class="scrollbar-inner"><?if ($arOffer['DETAIL_TEXT']):?><?= $arOffer['DETAIL_TEXT']?><?endif;?></div>
										</div>
									</div>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_OFFERS_ADDITIONAL_DESCRIPTION')?></h3>
										<div class="company__value">
											<div class="scrollbar-inner"><?if ($arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']):?><?= $arOffer['PROPERTIES']['ADDITIONAL_DESCRIPTION']['VALUE']?><?endif;?></div>
										</div>
									</div>
									<div class="company__property">
										<h6 class="h text-nowrap company__mail-title"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_EMAIL')?></h6><a class="company__email" href="<?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?>mailto:<?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?>"><?if ($arOffer['PROPERTIES']['EMAIL']['VALUE']):?><?= $arOffer['PROPERTIES']['EMAIL']['VALUE']?><?endif;?></a></div>
								</div>
							</div>
						</div>
					<?endif;?>
				<?endforeach;?>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="thumbnails">
				<h5 class="h"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANIES_AWAITING_MODERATION')?></h5>
				<?foreach ($arResult['ELEMENTS']['COMPANIES'] as $arCompany):?>
					<?if (!$arCompany['PROPERTIES']['COMMENT']['VALUE'] && $arCompany['PROPERTIES']['MODERATOR']['VALUE']):?>
						<div class="collapse-section"><button class="collapse-section__title" type="button" data-toggle="collapse" data-target="#collapse-<?= $arCompany['ID']?>" aria-expanded="false"><span><?= $arCompany['NAME']?></span><a class="change-button" href="javascript:void(0);" data-company-accept-id="<?= $arCompany['ID']?>"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANIES_ACCEPT')?></a><a class="change-button" href="javascript:void(0);" data-company-decline-id="<?= $arCompany['ID']?>" data-target="#companyedit"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANIES_DECLINE')?></a><i class="icomoon icon icon-arrow-expand"></i></button>
							<div
								class="collapse-section__content collapse" id="collapse-<?= $arCompany['ID']?>">
								<div class="company">
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_RUBRICS')?></h3>
										<div class="company__value">
											<?$index = 0;?>
											<?$lastIndex = count($arResult['RUBRICS']['COMPANIES'][$arCompany['ID']]) - 1;?>
											<?foreach ($arResult['RUBRICS']['COMPANIES'][$arCompany['ID']] as $arRubric):?>
												<a class="a" href="<?= $arRubric['SECTION_PAGE_URL']?>"><?= $arRubric['NAME']?><?if ($index != $lastIndex):?>, <?endif;?></a>
												<?$index++;?>
											<?endforeach;?>
										</div>
									</div>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_IMAGES')?></h3>
										<div class="company__value">
											<div class="thumbnails-gallery">
												<?foreach($arCompany['PROPERTIES']['IMAGES']['VALUE'] as $imageID):?>
													<?if (key_exists($imageID, $arResult['IMAGES']['COMPANIES'])):?>
														<figure class="thumbnails-gallery__item"><img class="thumbnails-gallery__image" src="<?= $arResult['IMAGES']['COMPANIES'][$imageID]['SRC']?>" /></figure>
													<?endif;?>
												<?endforeach;?>
											</div>
										</div>
									</div>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_ANOUNCE')?></h3>
										<div class="company__value"><?if ($arCompany['PREVIEW_TEXT']):?><?= $arCompany['PREVIEW_TEXT']?><?endif;?></div>
									</div>
									<div class="company__property">
										<h3 class="company__subheading"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_DESCRIPTION')?></h3>
										<div class="company__value">
											<div class="scrollbar-inner"><?if ($arCompany['DETAIL_TEXT']):?><?= $arCompany['DETAIL_TEXT']?><?endif;?></div>
										</div>
									</div>
									<?foreach ($arCompany['PROPERTIES'] as $arProperty):?>
										<?if (in_array($arProperty['CODE'], $arResult['PRINT_PROPERTIES'])):?>
											<div class="company__property">
												<h3 class="company__subheading"><?= $arProperty['NAME']?></h3>
												<div class="company__value"><?if ($arProperty['VALUE']):?><?= $arProperty['VALUE']?><?endif;?></div>
											</div>
										<?endif;?>
									<?endforeach;?>
									<div class="company__property">
										<h6 class="h text-nowrap company__mail-title"><?= GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_EMAIL')?></h6><a class="company__email" href="<?if ($arCompany['PROPERTIES']['EMAIL']['VALUE']):?>mailto:<?= $arCompany['PROPERTIES']['EMAIL']['VALUE']?><?endif;?>"><?if ($arCompany['PROPERTIES']['EMAIL']['VALUE']):?><?= $arCompany['PROPERTIES']['EMAIL']['VALUE']?><?endif;?></a></div>
								</div>
							</div>
						</div>
					<?endif;?>
				<?endforeach;?>
			</div>
		</div>
	</div>
	<?$APPLICATION->ShowViewContent('offer_edit')?>
	<?$APPLICATION->IncludeComponent(
		"intervolga.custom:ajax.component-company",
		"offer-edit",
		Array(
			"COMPONENT" => "intervolga.common:iblock.element.add.form",
			"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
			"COMPONENT_SECTION_1" => "intervolga.common",
			"COMPONENT_SECTION_2" => "FREE",
			"ID" => "offeredit",
			"INNER_BUTTON_TEXT" => "",
			"INNER_CODE" => "",
			"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
			"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
			"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
			"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
			"INNER_CUSTOM_TITLE_FIELD_ACTIVE_FROM" => "",
			"INNER_CUSTOM_TITLE_FIELD_ACTIVE_TO" => "",
			"INNER_CUSTOM_TITLE_FIELD_CODE" => "",
			"INNER_CUSTOM_TITLE_FIELD_DETAIL_PICTURE" => "",
			"INNER_CUSTOM_TITLE_FIELD_DETAIL_TEXT" => "",
			"INNER_CUSTOM_TITLE_FIELD_IBLOCK_SECTION" => "",
			"INNER_CUSTOM_TITLE_FIELD_NAME" => "",
			"INNER_CUSTOM_TITLE_FIELD_PREVIEW_PICTURE" => "",
			"INNER_CUSTOM_TITLE_FIELD_PREVIEW_TEXT" => "",
			"INNER_CUSTOM_TITLE_FIELD_TAGS" => "",
			"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
			"INNER_CUSTOM_TITLE_NAME" => "",
			"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
			"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_ACCEPT_MODERATION" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_ADDITIONAL_DESCRIPTION" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_ADDRESS" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_CITY" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_COMMENT" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_CONTACT_FACE" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_EMAIL" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_IMAGES" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_INN" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_MODERATOR" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_OFFERS" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_PHONE" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_SITE" => "",
			"INNER_CUSTOM_TITLE_TAGS" => "",
			"INNER_DEFAULT_INPUT_SIZE" => "30",
			"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
			"INNER_ELEMENT_ASSOC" => "PROPERTY_ID",
			"INNER_ELEMENT_ASSOC_PROPERTY" => "33",
			"INNER_FORM_ID" => "",
			"INNER_GROUPS" => array("1", "5"),
			"INNER_IBLOCK_CODE" => INTERVOLGA_CUSTOM_IBLOCK_CATALOG_OFFERS_CODE,
			"INNER_IBLOCK_ID" => Offer::getIblockId(),
			"INNER_IBLOCK_TYPE" => "catalog",
			"INNER_ID" => $_REQUEST['OFFER_ID'],
			"INNER_LEVEL_LAST" => "Y",
			"INNER_LIST_URL" => "",
			"INNER_MAX_FILE_SIZE" => "0",
			"INNER_MAX_LEVELS" => "100000",
			"INNER_MAX_USER_ENTRIES" => "100000",
			"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
			"INNER_PROPERTY_CODES" => array("PROPERTY_COMMENT"),
			"INNER_PROPERTY_CODES_HIDDEN" => array(),
			"INNER_PROPERTY_CODES_REQUIRED" => array("PROPERTY_COMMENT"),
			"INNER_RESIZE_IMAGES" => "N",
			"INNER_SEF_FOLDER" => "",
			"INNER_SEF_MODE" => "N",
			"INNER_SORT_FIELD_ACTIVE_FROM" => "",
			"INNER_SORT_FIELD_ACTIVE_TO" => "",
			"INNER_SORT_FIELD_CODE" => "",
			"INNER_SORT_FIELD_DETAIL_PICTURE" => "",
			"INNER_SORT_FIELD_DETAIL_TEXT" => "300",
			"INNER_SORT_FIELD_IBLOCK_SECTION" => "50",
			"INNER_SORT_FIELD_NAME" => "",
			"INNER_SORT_FIELD_PREVIEW_PICTURE" => "",
			"INNER_SORT_FIELD_PREVIEW_TEXT" => "100",
			"INNER_SORT_FIELD_TAGS" => "",
			"INNER_SORT_PROPERTY_ACCEPT_MODERATION" => "",
			"INNER_SORT_PROPERTY_ADDITIONAL_DESCRIPTION" => "400",
			"INNER_SORT_PROPERTY_ADDRESS" => "",
			"INNER_SORT_PROPERTY_CITY" => "",
			"INNER_SORT_PROPERTY_COMMENT" => "",
			"INNER_SORT_PROPERTY_CONTACT_FACE" => "",
			"INNER_SORT_PROPERTY_EMAIL" => "",
			"INNER_SORT_PROPERTY_IMAGES" => "200",
			"INNER_SORT_PROPERTY_INN" => "",
			"INNER_SORT_PROPERTY_MODERATOR" => "",
			"INNER_SORT_PROPERTY_OFFERS" => "",
			"INNER_SORT_PROPERTY_PHONE" => "",
			"INNER_SORT_PROPERTY_SITE" => "",
			"INNER_STATUS" => "ANY",
			"INNER_STATUS_NEW" => "N",
			"INNER_USER_MESSAGE_ADD" => "",
			"INNER_USER_MESSAGE_EDIT" => GetMessage('MAIN_PROFILE_DEFAULT_OFFER_DECLINE_MESSAGE_SAVE'),
			"INNER_USE_CAPTCHA" => "N",
			"INNER_USE_CUSTOM_TITLES" => "Y",
			"INNER_USE_DEFAULTS" => "N",
			"INNER_USE_SORT" => "Y",
			"INNER_XML_ID" => "",
			"SHOW_BUTTON" => "Y",
			"SIZE" => "",
			"TEMPLATE" => "main:modal-company-edit",
			"TITLE" => ""
		)
	);?>
	<?$APPLICATION->ShowViewContent('company_edit')?>
	<?$APPLICATION->IncludeComponent(
		"intervolga.custom:ajax.component-company",
		"company-edit",
		Array(
			"COMPONENT" => "intervolga.common:iblock.element.add.form",
			"COMPONENT_ID_REQUEST_NAME" => "AJAX_IID",
			"COMPONENT_SECTION_1" => "intervolga.common",
			"COMPONENT_SECTION_2" => "FREE",
			"ID" => "company-edit",
			"INNER_BUTTON_TEXT" => "",
			"INNER_CODE" => "",
			"INNER_CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
			"INNER_CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
			"INNER_CUSTOM_TITLE_DETAIL_PICTURE" => "",
			"INNER_CUSTOM_TITLE_DETAIL_TEXT" => "",
			"INNER_CUSTOM_TITLE_FIELD_ACTIVE_FROM" => "",
			"INNER_CUSTOM_TITLE_FIELD_ACTIVE_TO" => "",
			"INNER_CUSTOM_TITLE_FIELD_CODE" => "",
			"INNER_CUSTOM_TITLE_FIELD_DETAIL_PICTURE" => "",
			"INNER_CUSTOM_TITLE_FIELD_DETAIL_TEXT" => "",
			"INNER_CUSTOM_TITLE_FIELD_IBLOCK_SECTION" => "",
			"INNER_CUSTOM_TITLE_FIELD_NAME" => "",
			"INNER_CUSTOM_TITLE_FIELD_PREVIEW_PICTURE" => "",
			"INNER_CUSTOM_TITLE_FIELD_PREVIEW_TEXT" => "",
			"INNER_CUSTOM_TITLE_FIELD_TAGS" => "",
			"INNER_CUSTOM_TITLE_IBLOCK_SECTION" => "",
			"INNER_CUSTOM_TITLE_NAME" => "",
			"INNER_CUSTOM_TITLE_PREVIEW_PICTURE" => "",
			"INNER_CUSTOM_TITLE_PREVIEW_TEXT" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_ACCEPT_MODERATION" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_ADDITIONAL_DESCRIPTION" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_ADDRESS" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_CITY" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_COMMENT" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_CONTACT_FACE" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_EMAIL" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_IMAGES" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_INN" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_MODERATOR" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_OFFERS" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_PHONE" => "",
			"INNER_CUSTOM_TITLE_PROPERTY_SITE" => "",
			"INNER_CUSTOM_TITLE_TAGS" => "",
			"INNER_DEFAULT_INPUT_SIZE" => "30",
			"INNER_DETAIL_TEXT_USE_HTML_EDITOR" => "N",
			"INNER_ELEMENT_ASSOC" => "PROPERTY_ID",
			"INNER_ELEMENT_ASSOC_PROPERTY" => "33",
			"INNER_FORM_ID" => "",
			"INNER_GROUPS" => array("1", "5"),
			"INNER_IBLOCK_CODE" => INTERVOLGA_CUSTOM_IBLOCK_CATALOG_COMPANY_CODE,
			"INNER_IBLOCK_ID" => Company::getIblockId(),
			"INNER_IBLOCK_TYPE" => "catalog",
			"INNER_ID" => $_REQUEST['COMPANY_ID'],
			"INNER_LEVEL_LAST" => "Y",
			"INNER_LIST_URL" => "",
			"INNER_MAX_FILE_SIZE" => "0",
			"INNER_MAX_LEVELS" => "100000",
			"INNER_MAX_USER_ENTRIES" => "100000",
			"INNER_PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
			"INNER_PROPERTY_CODES" => array("PROPERTY_COMMENT"),
			"INNER_PROPERTY_CODES_HIDDEN" => array(),
			"INNER_PROPERTY_CODES_REQUIRED" => array("PROPERTY_COMMENT"),
			"INNER_RESIZE_IMAGES" => "N",
			"INNER_SEF_FOLDER" => "",
			"INNER_SEF_MODE" => "N",
			"INNER_SORT_FIELD_ACTIVE_FROM" => "",
			"INNER_SORT_FIELD_ACTIVE_TO" => "",
			"INNER_SORT_FIELD_CODE" => "",
			"INNER_SORT_FIELD_DETAIL_PICTURE" => "",
			"INNER_SORT_FIELD_DETAIL_TEXT" => "",
			"INNER_SORT_FIELD_IBLOCK_SECTION" => "",
			"INNER_SORT_FIELD_NAME" => "",
			"INNER_SORT_FIELD_PREVIEW_PICTURE" => "",
			"INNER_SORT_FIELD_PREVIEW_TEXT" => "",
			"INNER_SORT_FIELD_TAGS" => "",
			"INNER_SORT_PROPERTY_ACCEPT_MODERATION" => "",
			"INNER_SORT_PROPERTY_ADDITIONAL_DESCRIPTION" => "",
			"INNER_SORT_PROPERTY_ADDRESS" => "",
			"INNER_SORT_PROPERTY_CITY" => "",
			"INNER_SORT_PROPERTY_COMMENT" => "",
			"INNER_SORT_PROPERTY_CONTACT_FACE" => "",
			"INNER_SORT_PROPERTY_EMAIL" => "",
			"INNER_SORT_PROPERTY_IMAGES" => "",
			"INNER_SORT_PROPERTY_INN" => "",
			"INNER_SORT_PROPERTY_MODERATOR" => "",
			"INNER_SORT_PROPERTY_OFFERS" => "",
			"INNER_SORT_PROPERTY_PHONE" => "",
			"INNER_SORT_PROPERTY_SITE" => "",
			"INNER_STATUS" => "ANY",
			"INNER_STATUS_NEW" => "N",
			"INNER_USER_MESSAGE_ADD" => "",
			"INNER_USER_MESSAGE_EDIT" => GetMessage('MAIN_PROFILE_DEFAULT_COMPANY_DECLINE_MESSAGE_SAVE'),
			"INNER_USE_CAPTCHA" => "N",
			"INNER_USE_CUSTOM_TITLES" => "Y",
			"INNER_USE_DEFAULTS" => "N",
			"INNER_USE_SORT" => "Y",
			"INNER_XML_ID" => "",
			"SHOW_BUTTON" => "N",
			"SIZE" => "",
			"TEMPLATE" => "main:modal-company-edit",
			"TITLE" => GetMessage('MAIN_PROFILE_DEFAULT_EDIT')
		)
	);?>
<?endif;?>

<?$this->SetViewTarget('after_body');?>
	<?if($arResult["arUser"]["EXTERNAL_AUTH_ID"] == ''):?>
		<div class="modal fade" id="changePassword" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form method="post" name="profileform" class="form-horizontal form-change-password" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
						<?=$arResult["BX_SESSION_CHECK"]?>
						<input type="hidden" name="lang" value="<?=LANG?>" />
						<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><?= GetMessage('MAIN_PROFILE_DEFAULT_MODAL_TITLE')?></h4>
						</div>
						<div class="modal-body">
								<div class="alert alert-success" data-ok style="display: none">
									<?= GetMessage("PASSWORD_CHANGED");?>
								</div>
								<div class="alert alert-danger" data-error style="display: none">
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="NEW_PASSWORD"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
									<div class="col-md-9">
										<?if($arResult["SECURE_AUTH"]):?>
											<div class="input-group">
												<input type="password" name="NEW_PASSWORD" id="NEW_PASSWORD" class="form-control" maxlength="50" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>" />
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock fa fa-lock" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>"></i></span>
											</div>
										<?else:?>
											<input type="password" name="NEW_PASSWORD" id="NEW_PASSWORD" class="form-control" maxlength="50" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>" />
										<?endif;?>
										<span class="help-block"><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3" for="NEW_PASSWORD_CONFIRM"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
									<div class="col-md-9">
										<input type="password" name="NEW_PASSWORD_CONFIRM" class="form-control" id="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_CONFIRM')?>" />
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="LOGIN" value="<? echo $arResult["arUser"]["LOGIN"]?>" />
							<input type="hidden" name="EMAIL" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
							<input type="hidden" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
							<button type="button" class="btn btn-default" data-dismiss="modal"><?= GetMessage("MAIN_PROFILE_DEFAULT_MODAL_CLOSE")?></button>
							<button type="submit" class="btn btn-primary" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>"><?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?></button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<?endif;?>
<?$this->EndViewTarget();?>
