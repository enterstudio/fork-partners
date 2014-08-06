{include:{$BACKEND_CORE_PATH}/Layout/Templates/Head.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureStartModule.tpl}

<div class="pageTitle">
    <h2>{$lblPartnerWidgets|ucfirst}</h2>

    <div class="buttonHolderRight">
        <a href="{$var|geturl:'add'}" class="button icon iconAdd" title="{$lblAdd|ucfirst}">
            <span>{$lblAdd|ucfirst}</span>
        </a>
    </div>
</div>

{option:dgWidgets}
    <div class="dataGridHolder">
        <div class="tableHeading">
            <h3>{$lblPartnerWidgets|ucfirst}</h3>
        </div>
        {$dgWidgets}
    </div>
{/option:dgWidgets}

{option:noItems}<p>{$msgNoItems}</p>{/option:noItems}

{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureEndModule.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/Footer.tpl}
