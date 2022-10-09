"use strict";
setTimeout(function(){
        (function($) {
            "use strict";
            // Single Search Select
            $(".js-example-basic-single").select2();
            $(".js-example-disabled-results").select2();

            // Multi Select
            $(".js-example-basic-multiple").select2();

            // With Placeholder
            $(".js-example-placeholder-sekolah").select2({
                placeholder: "Pilih Sekolah"
            });

            $(".js-example-placeholder-jabatan").select2({
                placeholder: "Pilih Jabatan"
            });

            $(".js-example-placeholder-agama").select2({
                placeholder: "Pilih Agama"
            });

            $(".js-example-placeholder-stpegawai").select2({
                placeholder: "Pilih Status Pegawai"
            });

            $(".js-example-placeholder-kelamin").select2({
                placeholder: "Pilih Jenis Kelamin"
            });

            $(".js-example-placeholder-jabatan").select2({
                placeholder: "Pilih Jabatan"
            });

            $(".js-example-placeholder-kota").select2({
                placeholder: "Pilih Kota"
            });

            $(".js-example-placeholder-strata").select2({
                placeholder: "Pilih Strata"
            });

            $(".js-example-placeholder-jabatan").select2({
                placeholder: "Pilih Jabatan"
            });

            $(".js-example-placeholder-keluarga").select2({
                placeholder: "Pilih Status Keluarga"
            });

            $(".js-example-placeholder-status").select2({
                placeholder: "Pilih Status"
            });

            $(".js-example-placeholder-kode").select2({
                placeholder: "Pilih Kode"
            });

            $(".js-example-placeholder-pegawai").select2({
                placeholder: "Pilih Pegawai"
            });

            $(".js-example-placeholder-pangkat").select2({
                placeholder: "Pilih Pangkat"
            });

            $(".js-example-placeholder-golongan").select2({
                placeholder: "Pilih Golongan"
            });

            //Limited Numbers
            $(".js-example-basic-multiple-limit").select2({
                maximumSelectionLength: 2
            });

            //RTL Suppoort
            $(".js-example-rtl").select2({
                dir: "rtl"
            });
            // Responsive width Search Select
            $(".js-example-basic-hide-search").select2({
                minimumResultsForSearch: Infinity
            });
            $(".js-example-disabled").select2({
                disabled: true
            });
            $(".js-programmatic-enable").on("click", function() {
                $(".js-example-disabled").prop("disabled", false);
            });
            $(".js-programmatic-disable").on("click", function() {
                $(".js-example-disabled").prop("disabled", true);
            });
        })(jQuery);
    }
    ,350);