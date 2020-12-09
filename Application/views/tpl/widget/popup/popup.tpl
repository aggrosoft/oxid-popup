[{if $oViewConf->showPopup()}]
    [{oxifcontent ident=$oViewConf->getPopupCmsIdent() assign=oContent}]
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">[{$oContent->oxcontents__oxtitle->value}]</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    [{oxcontent ident=$oContent->oxcontent__oxident->value}]
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    [{/oxifcontent}]
[{/if}]