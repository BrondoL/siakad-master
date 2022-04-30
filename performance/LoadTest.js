import http from "k6/http";
import { check, group, sleep } from "k6";
import { token } from "./constant.js";

export const options = {
    stages: [
        { duration: "1m", target: 200 },
        { duration: "2m", target: 200 },
        { duration: "1m", target: 480 },
        { duration: "2m", target: 480 },
        { duration: "4m", target: 0 },
    ],
    thresholds: {
        http_req_failed: ["rate<0.01"], // http errors should be less than 1%
        http_req_duration: ["p(90) < 300", "p(95) < 450", "p(99.9) < 600"], // 95% of requests should be below 200ms
    },
    discardResponseBodies: true,
};
const SLEEP_DURATION = 1;

export default function () {
    const params = {
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${token}`,
        },
        tags: {
            name: "",
        },
    };

    group("siakad journey", (_) => {
        // LIST PERIODE
        params.tags.name = "List periode";
        const get_periode_response = http.get(
            "https://master.brondol.works/v1/periode",
            params
        );
        check(get_periode_response, {
            "List periode status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST YAYASAN
        params.tags.name = "List yayasan";
        const get_yayasan_response = http.get(
            "https://master.brondol.works/v1/yayasan",
            params
        );
        check(get_yayasan_response, {
            "List yayasan status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PT
        params.tags.name = "List pt";
        const get_pt_response = http.get(
            "https://master.brondol.works/v1/pt",
            params
        );
        check(get_pt_response, {
            "List pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST TAHUN AJARAN
        params.tags.name = "List tahun ajaran";
        const get_tahun_ajaran_response = http.get(
            "https://master.brondol.works/v1/tahun-ajaran",
            params
        );
        check(get_tahun_ajaran_response, {
            "List tahun ajaran status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JENJANG PENDIDIKAN PT
        params.tags.name = "List jenjang pendidikan pt";
        const get_jenjang_pendidikan_pt_response = http.get(
            "https://master.brondol.works/v1/jenjang-pendidikan-pt",
            params
        );
        check(get_jenjang_pendidikan_pt_response, {
            "List jenjang pendidikan pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST NEGARA
        params.tags.name = "List negara";
        const get_negara_response = http.get(
            "https://master.brondol.works/v1/negara",
            params
        );
        check(get_negara_response, {
            "List negara status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JENJANG PENDIDIKAN
        params.tags.name = "List jenjang pendidikan";
        const get_jenjang_pendidikan_response = http.get(
            "https://master.brondol.works/v1/jenjang-pendidikan",
            params
        );
        check(get_jenjang_pendidikan_response, {
            "List jenjang pendidikan status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST SUKU
        params.tags.name = "List suku";
        const get_suku_response = http.get(
            "https://master.brondol.works/v1/suku",
            params
        );
        check(get_suku_response, {
            "List suku status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST KOTA
        params.tags.name = "List kota";
        const get_kota_response = http.get(
            "https://master.brondol.works/v1/kota",
            params
        );
        check(get_kota_response, {
            "List kota status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST AGAMA
        params.tags.name = "List agama";
        const get_agama_response = http.get(
            "https://master.brondol.works/v1/agama",
            params
        );
        check(get_agama_response, {
            "List agama status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST BIDANG ILMU PT
        params.tags.name = "List bidang ilmu pt";
        const get_bidang_ilmu_pt_response = http.get(
            "https://master.brondol.works/v1/bidang-ilmu-pt",
            params
        );
        check(get_bidang_ilmu_pt_response, {
            "List bidang ilmu pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST BIDANG ILMU
        params.tags.name = "List bidang ilmu";
        const get_bidang_ilmu_response = http.get(
            "https://master.brondol.works/v1/bidang-ilmu",
            params
        );
        check(get_bidang_ilmu_response, {
            "List bidang ilmu status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST HOBI
        params.tags.name = "List hobi";
        const get_hobi_response = http.get(
            "https://master.brondol.works/v1/hobi",
            params
        );
        check(get_hobi_response, {
            "List hobi status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST MINAT
        params.tags.name = "List minat";
        const get_minat_response = http.get(
            "https://master.brondol.works/v1/minat",
            params
        );
        check(get_minat_response, {
            "List minat status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST UNIVERSITAS OPT
        params.tags.name = "List universitas opt";
        const get_universitas_opt_response = http.get(
            "https://master.brondol.works/v1/universitas-opt",
            params
        );
        check(get_universitas_opt_response, {
            "List universitas opt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST UNIVERSITAS
        params.tags.name = "List universitas";
        const get_universitas_response = http.get(
            "https://master.brondol.works/v1/universitas",
            params
        );
        check(get_universitas_response, {
            "List universitas status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JABATAN STRUKTURAL
        params.tags.name = "List jabatan struktural";
        const get_jabatan_struktural_response = http.get(
            "https://master.brondol.works/v1/jabatan-struktural",
            params
        );
        check(get_jabatan_struktural_response, {
            "List jabatan struktural status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PANGKAT
        params.tags.name = "List pangkat";
        const get_pangkat_response = http.get(
            "https://master.brondol.works/v1/pangkat",
            params
        );
        check(get_pangkat_response, {
            "List pangkat status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PEGAWAI
        params.tags.name = "List pegawai";
        const get_pegawai_response = http.get(
            "https://master.brondol.works/v1/pegawai",
            params
        );
        check(get_pegawai_response, {
            "List pegawai status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PEGAWAI PT
        params.tags.name = "List pegawai pt";
        const get_pegawai_pt_response = http.get(
            "https://master.brondol.works/v1/pegawai-pt",
            params
        );
        check(get_pegawai_pt_response, {
            "List pegawai pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JABATAN FUNGSIONAL
        params.tags.name = "List jabatan fungsional";
        const get_jabatan_fungsional_response = http.get(
            "https://master.brondol.works/v1/jabatan-fungsional",
            params
        );
        check(get_jabatan_fungsional_response, {
            "List jabatan fungsional status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JENIS PEGAWAI
        params.tags.name = "List jenis pegawai";
        const get_jenis_pegawai_response = http.get(
            "https://master.brondol.works/v1/jenis-pegawai",
            params
        );
        check(get_jenis_pegawai_response, {
            "List jenis pegawai status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST STATUS PEGAWAI
        params.tags.name = "List status pegawai";
        const get_status_pegawai_response = http.get(
            "https://master.brondol.works/v1/status-pegawai",
            params
        );
        check(get_status_pegawai_response, {
            "List status pegawai status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST BIDANG STUDI
        params.tags.name = "List bidang studi";
        const get_bidang_studi_response = http.get(
            "https://master.brondol.works/v1/bidang-studi",
            params
        );
        check(get_bidang_studi_response, {
            "List bidang studi status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST UNIT
        params.tags.name = "List unit";
        const get_unit_response = http.get(
            "https://master.brondol.works/v1/unit",
            params
        );
        check(get_unit_response, {
            "List unit status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST KELAS PERKULIAHAN
        params.tags.name = "List kelas perkuliahan";
        const get_kelas_perkuliahan_response = http.get(
            "https://master.brondol.works/v1/kelas-perkuliahan",
            params
        );
        check(get_kelas_perkuliahan_response, {
            "List kelas perkuliahan status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST TAHUN KURIKULUM
        params.tags.name = "List tahun kurikulum";
        const get_tahun_kurikulum_response = http.get(
            "https://master.brondol.works/v1/tahun-kurikulum",
            params
        );
        check(get_tahun_kurikulum_response, {
            "List tahun kurikulum status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST GELOMBANG PT
        params.tags.name = "List gelombang pt";
        const get_gelombang_pt_response = http.get(
            "https://master.brondol.works/v1/gelombang-pt",
            params
        );
        check(get_gelombang_pt_response, {
            "List gelombang pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST GELOMBANG
        params.tags.name = "List gelombang";
        const get_gelombang_response = http.get(
            "https://master.brondol.works/v1/gelombang",
            params
        );
        check(get_gelombang_response, {
            "List gelombang status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JALUR PENDAFTARAN PT
        params.tags.name = "List jalur pendaftaran pt";
        const get_jalur_pendaftaran_pt_response = http.get(
            "https://master.brondol.works/v1/jalur-pendaftaran-pt",
            params
        );
        check(get_jalur_pendaftaran_pt_response, {
            "List jalur pendaftaran pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JALUR PENDAFTARAN
        params.tags.name = "List jalur pendaftaran";
        const get_jalur_pendaftaran_response = http.get(
            "https://master.brondol.works/v1/jalur-pendaftaran",
            params
        );
        check(get_jalur_pendaftaran_response, {
            "List jalur pendaftaran status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST SISTEM KULIAH PT
        params.tags.name = "List sistem kuliah pt";
        const get_sistem_kuliah_pt_response = http.get(
            "https://master.brondol.works/v1/sistem-kuliah-pt",
            params
        );
        check(get_sistem_kuliah_pt_response, {
            "List sistem kuliah pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST SISTEM KULIAH
        params.tags.name = "List sistem kuliah";
        const get_sistem_kuliah_response = http.get(
            "https://master.brondol.works/v1/sistem-kuliah",
            params
        );
        check(get_sistem_kuliah_response, {
            "List sistem kuliah status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PEKERJAAN OPT
        params.tags.name = "List pekerjaan opt";
        const get_pekerjaan_opt_response = http.get(
            "https://master.brondol.works/v1/pekerjaan-opt",
            params
        );
        check(get_pekerjaan_opt_response, {
            "List pekerjaan opt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PEKERJAAN
        params.tags.name = "List pekerjaan";
        const get_pekerjaan_response = http.get(
            "https://master.brondol.works/v1/pekerjaan",
            params
        );
        check(get_pekerjaan_response, {
            "List pekerjaan status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PENGHASILAN OPT
        params.tags.name = "List penghasilan opt";
        const get_penghasilan_opt_response = http.get(
            "https://master.brondol.works/v1/penghasilan-opt",
            params
        );
        check(get_penghasilan_opt_response, {
            "List penghasilan opt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST PENGHASILAN
        params.tags.name = "List penghasilan";
        const get_penghasilan_response = http.get(
            "https://master.brondol.works/v1/penghasilan",
            params
        );
        check(get_penghasilan_response, {
            "List penghasilan status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST JENIS TINGGAL
        params.tags.name = "List jenis tinggal";
        const get_jenis_tinggal_response = http.get(
            "https://master.brondol.works/v1/jenis-tinggal",
            params
        );
        check(get_jenis_tinggal_response, {
            "List jenis tinggal status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST TRANSPORT
        params.tags.name = "List transport";
        const get_transport_response = http.get(
            "https://master.brondol.works/v1/transport",
            params
        );
        check(get_transport_response, {
            "List transport status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST STATUS MAHASISWA OPT
        params.tags.name = "List status mahasiswa opt";
        const get_status_mahasiswa_opt_response = http.get(
            "https://master.brondol.works/v1/status-mahasiswa-opt",
            params
        );
        check(get_status_mahasiswa_opt_response, {
            "List status mahasiswa opt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST STATUS MAHASISWA
        params.tags.name = "List status mahasiswa";
        const get_status_mahasiswa_response = http.get(
            "https://master.brondol.works/v1/status-mahasiswa",
            params
        );
        check(get_status_mahasiswa_response, {
            "List status mahasiswa status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST ALMAMATER
        params.tags.name = "List almamater";
        const get_almamater_response = http.get(
            "https://master.brondol.works/v1/almamater",
            params
        );
        check(get_almamater_response, {
            "List almamater status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST UNIVERSITAS PRODI
        params.tags.name = "List universitas prodi";
        const get_universitas_prodi_response = http.get(
            "https://master.brondol.works/v1/universitas-prodi",
            params
        );
        check(get_universitas_prodi_response, {
            "List universitas prodi status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST MAHASISWA
        params.tags.name = "List mahasiswa";
        const get_mahasiswa_response = http.get(
            "https://master.brondol.works/v1/mahasiswa",
            params
        );
        check(get_mahasiswa_response, {
            "List mahasiswa status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST MAHASISWA PT
        params.tags.name = "List mahasiswa pt";
        const get_mahasiswa_pt_response = http.get(
            "https://master.brondol.works/v1/mahasiswa-pt",
            params
        );
        check(get_mahasiswa_pt_response, {
            "List mahasiswa pt status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST MAHASISWA KELUAR
        params.tags.name = "List mahasiswa keluar";
        const get_mahasiswa_keluar_response = http.get(
            "https://master.brondol.works/v1/mahasiswa-keluar",
            params
        );
        check(get_mahasiswa_keluar_response, {
            "List mahasiswa keluar status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);

        // LIST KELUARGA MHS
        params.tags.name = "List keluarga mhs";
        const get_keluarga_mhs_response = http.get(
            "https://master.brondol.works/v1/keluarga-mhs",
            params
        );
        check(get_keluarga_mhs_response, {
            "List keluarga mhs status 200": (r) => r.status === 200,
        });
        sleep(SLEEP_DURATION);
    });
}
