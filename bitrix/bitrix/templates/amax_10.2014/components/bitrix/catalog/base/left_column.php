<?if (!empty($_GET['details'])):?>
<aside class="left">
    <?
//    var_dump($APPLICATION->GetCurPage());
    $pars= array(
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "PROPERTY_CMP" => array(
            '=',
            '=',
            '=',
            '=',
        ),
        "FILTER_NAME" => "autoFilter",
        "FILTER_HEAD" => "Фильтр",
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    );
    $sect= array();

    if (preg_match('/\/diski\//', $APPLICATION->GetCurPage()))
        $sect["PROPERTY_CODE"]= array("diski_lay", "diski_svr", "diski_out", 'diski_ddisk', 'diski_width', 'diski_dhole');
    else if (preg_match('/\/shiny\//', $APPLICATION->GetCurPage()))
        $sect["PROPERTY_CODE"]= array("shiny_brand", "shiny_width", "shiny_height", 'shiny_diameter', 'shiny_seazon', 'shiny_use');
    else if (preg_match('/(\/avtokhimiya\/)|(\/prisadki-v-maslo-toplivo\/)|(\/germetiki-i-klei\/)|(\/rastvoriteli\/)|(\/shpatlevki\/)|(\/kholodnye-svarki\/)|(\/ochistiteli\/)|(\/avtokhimiya-prochie\/)/', $APPLICATION->GetCurPage()))
        $sect["PROPERTY_CODE"]= array("chem_brand");
    else if (preg_match('/(\/masla-motornye\/)|(\/masla-transmissionnye\/)|(\/masla-spetsialnye\/)/', $APPLICATION->GetCurPage()))
        $sect["PROPERTY_CODE"]= array("oil_brand", 'oil_eng', 'oil_oil', 'oil_vsk');
    else if (preg_match('/\/smazki\//', $APPLICATION->GetCurPage()))
        $sect["PROPERTY_CODE"]= array("oil_smazki_brand");
    else if (preg_match('/\/masla-promyvochnye\//', $APPLICATION->GetCurPage()))
        $sect["PROPERTY_CODE"]= array("oil_promyv_brand");
    else if (preg_match('/\/raskhodnye-zhidkosti\//', $APPLICATION->GetCurPage()))
        $sect["PROPERTY_CODE"]= array("liquid_brand");

    if (!empty($sect)) {
        $pars=array_merge($pars, $sect);
        $APPLICATION->IncludeComponent("webpro:cat_filter", "", $pars, false);
    }
    ?>
</aside>
<?endif?>