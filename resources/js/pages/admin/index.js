import "./tabulator";

(function () {
    "use strict";

    $(document).on('click', '.btn-admin-edit', function (e) {
        e.preventDefault();

        formReset("PATCH", $(this).data('form-url'));

        const url = $(this).data('url');

        axios.get(url).then((res) => {
            const data = res.data.data;

            $("input#admin-name").val(data.name);
            $("input#admin-email").val(data.email);
            $('#admin-roles')[0].tomselect.setValue(data.roles_id);
            $('#admin-active')[0].tomselect.setValue(data.status);

        }).catch((err) => {
            console.error(err);
            alert(err);
        }).finally(() => {
            createIcons({
                icons,
                "stroke-width": 1.5,
                nameAttr: "data-lucide",
            });

            const el = document.querySelector("#form-update-modal");
            const modal = window.tailwind.Modal.getOrCreateInstance(el);
            modal.toggle();
        });
    });

    $(".btn-admin-add").on('click', function (e) {
        e.preventDefault();

        // formReset("POST", $(this).data('form-url'));

        const el = document.querySelector("#form-admin-modal");
        const modal = window.tailwind.Modal.getOrCreateInstance(el);
        modal.toggle();
    });

    $(document).on('click', '.btn-password-edit',function (e) {
        e.preventDefault();

        formReset("PATCH", $(this).data('form-url'));

        const el = document.querySelector("#form-password-modal");
        const modal = window.tailwind.Modal.getOrCreateInstance(el);
        modal.toggle();
    });


    function formReset(method = 'POST', url) {
        const form = $("form#form-admin");
        form[0].reset();

        form.find("input[name=\"_method\"]").val(method);
        form.attr("action", url);
    }
})();
