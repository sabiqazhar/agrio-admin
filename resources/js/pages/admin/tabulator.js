import Swal from "sweetalert2";
import {TabulatorFull as Tabulator} from "tabulator-tables";

(function() {
    "use strict"

    const tableEl = $("#admin-tabulator");

    if (tableEl.length && tableEl.data('url')) {
        const url = tableEl.data('url');
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        const tabulator = new Tabulator("#admin-tabulator", {
            ajaxURL: url,
            ajaxContentType: "json",
            paginationMode: "remote",
            filterMode: "remote",
            sortMode: "remote",
            pagination: true,
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 50, 100],
            paginationCounter: "rows",
            layout: "fitColumns",
            responsiveLayout: "collapse",
            placeholder: "Data tidak ditemukan",
            // persistence: true,
            selectable: false,
            columns: [
                {
                    title: "No",
                    width: 150,
                    responsive: 0,
                    vertAlign: "middle",
                    headerHozAlign: "center",
                    hozAlign: "center",
                    print: false,
                    download: false,
                    formatter:"rownum"
                },
                {
                    title: "Nama",
                    minWidth: 200,
                    responsive: 0,
                    field: "name",
                    vertAlign: "middle",
                    headerHozAlign: "center",
                    hozAlign: "center",
                    print: false,
                    download: false,
                },
                {
                    title: "Email",
                    minWidth: 200,
                    responsive: 0,
                    field: "email",
                    vertAlign: "middle",
                    headerHozAlign: "center",
                    hozAlign: "center",
                    print: false,
                    download: false,
                },
                {
                    title: "Role",
                    minWidth: 200,
                    responsive: 0,
                    field: "roles",
                    vertAlign: "middle",
                    headerHozAlign: "center",
                    hozAlign: "center",
                    print: false,
                    download: false,
                },
                {
                    title: "Status",
                    minWidth: 200,
                    responsive: 0,
                    field: "active",
                    vertAlign: "middle",
                    headerHozAlign: "center",
                    hozAlign: "center",
                    print: false,
                    download: false,
                },
                {
                    title: "ACTIONS",
                    width: 300,
                    field: "actions",
                    responsive: 1,
                    hozAlign: "center",
                    headerHozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell, formatterParams) {
                        return `<div class="flex items-center lg:justify-center">
                        <a href="javascript:;" class="flex items-center mr-3 text-warning btn-admin-edit" data-url="${cell.getData().detail_url}" data-form-url="${cell.getData().update_url}">
                            <i data-lucide="pencil" class="w-4 h-4 mr-1"></i> Edit
                        </a>

                        <a href="javascript:void(0);" class="flex items-center text-danger mr-3" onclick="alertConfirm('delete-admin-form-${cell.getData().id}')">
                        <i data-lucide="trash" class="w-4 h-4 mr-1"></i> Delete
                        </a>

                        <a href="javascript:;" class="flex items-center mr-3 text-primary btn-password-edit" data-url="${cell.getData().detail_url}" data-form-url="${cell.getData().password_url}">
                            <i data-lucide="inbox" class="w-4 h-4 mr-1"></i> Ubah password
                        </a>

                        <form id="delete-admin-form-${cell.getData().id}" action="${cell.getData().delete_url}" method="POST">
                            <input type="hidden" name="_token" value="${CSRF_TOKEN}">
                            <input type="hidden" name="_method" value="DELETE">
                        </form>

                        </div>`
                    },
                },
            ]
        });

        tabulator.on("renderComplete", () => {
            createIcons({
                icons,
                attrs: {
                    "stroke-width": 1.5,
                },
                nameAttr: "data-lucide",
            });
        });

        // Redraw table onresize
        window.addEventListener("resize", () => {
            tabulator.redraw();
            createIcons({
                icons,
                "stroke-width": 1.5,
                nameAttr: "data-lucide",
            });
        });

        // Filter function
        function filterHTMLForm() {
            let value = $("#tabulator-html-filter-value").val();
            tabulator.setFilter([
                {field:'value', type:'like', value:value},
            ]);
        }

        $("#tabulator-html-filter-value").on('keyup', helper.delayWithClear(function(e){
            e.preventDefault();
            filterHTMLForm();
        }, 700));

        $("#tabulator-html-filter-reset").on("click", function (e) {
            e.preventDefault();
            $("#tabulator-html-filter-value").val("");
            filterHTMLForm();
        });

        window.alertConfirm = function (formId) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Apakah anda ingin melanjutkan proses ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#E11D48',
                confirmButtonText: 'Ya, lanjutkan!',
                cancelButtonText: "Tidak!",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    }
})()
