import "./tabulator";

(function () {
    "use strict";

    $(document).on('click', '.btn-owner-edit', function (e) {
        e.preventDefault();

        formReset("PATCH", $(this).data('form-url'));

        const url = $(this).data('url');

        axios.get(url).then((res) => {
            const data = res.data.data;

            $("input#owner-name").val(data.name);
            $("input#owner-phone").val(data.phone);
            $("input#owner-ktp").val(data.ktp);
            $("input#owner-email").val(data.email);

        }).catch((err) => {
            console.error(err);
            alert(err);
        }).finally(() => {
            createIcons({
                icons,
                "stroke-width": 1.5,
                nameAttr: "data-lucide",
            });

            const el = document.querySelector("#form-owner-modal");
            const modal = window.tailwind.Modal.getOrCreateInstance(el);
            modal.toggle();
        });
    });

    $(".btn-owner-add").on('click', function (e) {
        e.preventDefault();

        // formReset("POST", $(this).data('form-url'));

        const el = document.querySelector("#form-owner-modal");
        const modal = window.tailwind.Modal.getOrCreateInstance(el);
        modal.toggle();
    });

    function formReset(method = 'POST', url) {
        const form = $("form#form-owner");
        form[0].reset();

        form.find("input[name=\"_method\"]").val(method);
        form.attr("action", url);
    }
})();
