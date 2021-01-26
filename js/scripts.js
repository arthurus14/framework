function toggle() {
    $(document).ready(function() {
        $("form").hide();
    });


    $(document).ready(function() {
        $("#clicNomSite").click(function() {
            $("#nomDuSite").toggle();
        });
    });

    $(document).ready(function() {
        $("#clicLogo").click(function() {
            $("#logoSite").toggle();
        });
    });


    $(document).ready(function() {
        $("#clicJumbo").click(function() {
            $("#jumboSite").toggle();
        });
    });

    $(document).ready(function() {
        $("#clicCharactere").click(function() {
            $("#charactere").toggle();
        });
    });

}