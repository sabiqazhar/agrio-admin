import "./tabulator";

(function () {
    "use strict";

    $(document).on('click', '.btn-store-edit', function (e) {
        e.preventDefault();

        formReset("PATCH", $(this).data('form-url'));

        const url = $(this).data('url');

        axios.get(url).then((res) => {
            const data = res.data.data;

            $("input#store-name").val(data.name);
            $("input#store-phone").val(data.phone);
            $('#owner_id')[0].tomselect.setValue(data.owner_id);
            $('#active')[0].tomselect.setValue(data.status);
            $("textarea#store-address").val(data.address);
            $("input#store-latitude").val(data.lat);
            $("input#store-longitude").val(data.lon);

        }).catch((err) => {
            console.error(err);
            alert(err);
        }).finally(() => {
            createIcons({
                icons,
                "stroke-width": 1.5,
                nameAttr: "data-lucide",
            });

            const el = document.querySelector("#form-store-modal");
            const modal = window.tailwind.Modal.getOrCreateInstance(el);
            modal.toggle();
        });
    });

    $(".btn-store-add").on('click', function (e) {
        e.preventDefault();

        // formReset("POST", $(this).data('form-url'));

        const el = document.querySelector("#form-store-modal");
        const modal = window.tailwind.Modal.getOrCreateInstance(el);
        modal.toggle();
    });

    function formReset(method = 'POST', url) {
        const form = $("form#form-store");
        form[0].reset();

        form.find("input[name=\"_method\"]").val(method);
        form.attr("action", url);
    }
})();
