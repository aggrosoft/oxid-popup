[{if $oViewConf->showPopup()}]
    [{oxifcontent ident=$oViewConf->getPopupCmsIdent() object=oContent}]
        <div id="agpopup-modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">[{$oContent->oxcontents__oxtitle->value}]</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        [{oxcontent ident=$oContent->oxcontents__oxloadid->value}]
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    [{capture assign=pageScript}]
        $(function(){
        $('#agpopup-modal').on('hidden.bs.modal', function (e) {
        var days = [{$oViewConf->getPopupCookieLifetime()}];
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();

        document.cookie = "agpopupshown=1"+expires+"; path=/;";
        });
        $('#agpopup-modal').modal('show');
        });
    [{/capture}]
    [{oxscript add=$pageScript}]
    [{/oxifcontent}]
[{/if}]