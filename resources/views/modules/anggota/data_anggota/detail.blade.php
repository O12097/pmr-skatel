@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Detail Pendaftar')
<link rel="stylesheet"
    href="https://d2s3ptptdai04x.cloudfront.net/get-flowbite-pro.67f4bcb5-8f31-4714-bbfd-090870387e75.css?Expires=2014899005&amp;Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cHM6Ly9kMnMzcHRwdGRhaTA0eC5jbG91ZGZyb250Lm5ldC9nZXQtZmxvd2JpdGUtcHJvLjY3ZjRiY2I1LThmMzEtNDcxNC1iYmZkLTA5MDg3MDM4N2U3NS5jc3MiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjIwMTQ4OTkwMDV9fX1dfQ__&amp;Signature=ISCa3SKo8ccxqG9ZGZvWSnNnM5Ss0YdeKbvQ2Ha1RavqSwxAPYVYrybEXF55dNd-N05OUyyq3vI1kiMzcEhmgRAOrezAt2iIvMsNSPfE5Xqh17VZcY6hJ-kVchxZpBajJQHRqSei8rqWS7k3D4IWNLf~PbqI6XCGPoiU7Pl-Pk4mJzL0I96fN8FSl3rBxFy4jBuY3AYhU4vgphfHpqheQHELb2GmSkYKYgu8LDcuDJQv4Q4yiQc1i5-uUOPFQmEre4QtjG3MxWDoXs-gOhBJug2IYvIiGF56OtNyAABgpbToj~JW3UIBCuL1Kch6-q3e7rJ8ZEuSv03aKyVemycKnA__&amp;Key-Pair-Id=K2J5W1U51CTOXP" />


<style>
    .centered-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    <style>

    /* ! tailwindcss v3.3.5 | MIT License | https://tailwindcss.com */
    *,
    ::after,
    ::before {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb;
    }

    ::after,
    ::before {
        --tw-content: "";
    }

    html {
        line-height: 1.5;
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 4;
        tab-size: 4;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, system-ui,
            Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
            Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        font-feature-settings: normal;
        font-variation-settings: normal;
    }

    body {
        margin: 0;
        line-height: inherit;
    }

    hr {
        height: 0;
        color: inherit;
        border-top-width: 1px;
    }

    abbr:where([title]) {
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-size: inherit;
        font-weight: inherit;
    }

    a {
        color: inherit;
        text-decoration: inherit;
    }

    b,
    strong {
        font-weight: bolder;
    }

    code,
    kbd,
    pre,
    samp {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas,
            "Liberation Mono", "Courier New", monospace;
        font-size: 1em;
    }

    small {
        font-size: 80%;
    }

    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
    }

    sub {
        bottom: -0.25em;
    }

    sup {
        top: -0.5em;
    }

    table {
        text-indent: 0;
        border-color: inherit;
        border-collapse: collapse;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        font-feature-settings: inherit;
        font-variation-settings: inherit;
        font-size: 100%;
        font-weight: inherit;
        line-height: inherit;
        color: inherit;
        margin: 0;
        padding: 0;
    }

    button,
    select {
        text-transform: none;
    }

    [type="button"],
    [type="reset"],
    [type="submit"],
    button {
        -webkit-appearance: button;
        background-color: transparent;
        background-image: none;
    }

    :-moz-focusring {
        outline: auto;
    }

    :-moz-ui-invalid {
        box-shadow: none;
    }

    progress {
        vertical-align: baseline;
    }

    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
        height: auto;
    }

    [type="search"] {
        -webkit-appearance: textfield;
        outline-offset: -2px;
    }

    ::-webkit-search-decoration {
        -webkit-appearance: none;
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit;
    }

    summary {
        display: list-item;
    }

    blockquote,
    dd,
    dl,
    figure,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    p,
    pre {
        margin: 0;
    }

    fieldset {
        margin: 0;
        padding: 0;
    }

    legend {
        padding: 0;
    }

    menu,
    ol,
    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    dialog {
        padding: 0;
    }

    textarea {
        resize: vertical;
    }

    input::placeholder,
    textarea::placeholder {
        opacity: 1;
        color: #9ca3af;
    }

    [role="button"],
    button {
        cursor: pointer;
    }

    :disabled {
        cursor: default;
    }

    audio,
    canvas,
    embed,
    iframe,
    img,
    object,
    svg,
    video {
        display: block;
        vertical-align: middle;
    }

    img,
    video {
        max-width: 100%;
        height: auto;
    }

    [hidden] {
        display: none;
    }

    *,
    ::before,
    ::after {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
    }

    ::backdrop {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
    }

    .bg-primary-100 {
        --tw-bg-opacity: 1;
        background-color: rgb(219 234 254 / var(--tw-bg-opacity));
    }

    .bg-primary-700 {
        --tw-bg-opacity: 1;
        background-color: rgb(29 78 216 / var(--tw-bg-opacity));
    }

    .text-primary-800 {
        --tw-text-opacity: 1;
        color: rgb(30 64 175 / var(--tw-text-opacity));
    }

    .hover\:bg-primary-800:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(30 64 175 / var(--tw-bg-opacity));
    }

    .hover\:text-primary-700:hover {
        --tw-text-opacity: 1;
        color: rgb(29 78 216 / var(--tw-text-opacity));
    }

    .focus\:ring-primary-300:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(147 197 253 / var(--tw-ring-opacity));
    }

    :is(.dark .dark\:bg-primary-200) {
        --tw-bg-opacity: 1;
        background-color: rgb(191 219 254 / var(--tw-bg-opacity));
    }

    :is(.dark .dark\:bg-primary-600) {
        --tw-bg-opacity: 1;
        background-color: rgb(37 99 235 / var(--tw-bg-opacity));
    }

    :is(.dark .dark\:text-primary-800) {
        --tw-text-opacity: 1;
        color: rgb(30 64 175 / var(--tw-text-opacity));
    }

    :is(.dark .dark\:hover\:bg-primary-700:hover) {
        --tw-bg-opacity: 1;
        background-color: rgb(29 78 216 / var(--tw-bg-opacity));
    }

    :is(.dark .dark\:focus\:ring-primary-800:focus) {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(30 64 175 / var(--tw-ring-opacity));
    }
</style>

@section('content')
    {{-- @isset($pendaftar)
        <h2>Detail Pendaftar</h2>
        <p>NIS: {{ $pendaftar->nis }}</p>
        <p>Nama Siswa: {{ $pendaftar->nama_siswa }}</p>
        <p>Kelas: {{ $pendaftar->kelas->kelas }}</p>
        <p>Jurusan: {{ $pendaftar->jurusan->jurusan }}</p>
        <p>Email: {{ $pendaftar->email }}</p>
        <p>No Telp: {{ $pendaftar->no_telp }}</p>
    @else
        <p>Data tidak ditemukan</p>
    @endisset --}}
    @isset($dataSiswa)
        <section class="yjGyQxv8jnYk9_MGMqLN zlFmyfujKXCLCPyPEOIS mt-[40px] bg-white shadow rounded">
            <div
                class="OmM4wtdsNjVR2r7OSzsm RV8RoaI_SlEMC5CEQ3ms jj0BrgkBpq72EXwWuBh5 px-28 max-w-[80rem] min-w-[50rem] text-xl">
                <div
                    class="i0EfZzmTLElZVOble53D Ced8tRkG1VjcbmNVdBtj veFXkDzfJN473U3ycrV8 _9OKVeTXzfSwD_NYO6_G F4SPvvqykwH_AGlVvGqN rVDZiB_sQDW_cniUhBYT K6JeoaAB0AqiLUrPNn42">
                    <!-- Column -->
                    <div class="nqKrWSk_pMaLoiyBLZG5">
                        <div class="kqgYncRJQ7spwKfig6It neyUwteEn7DOg9pBSJJE ZLpoEVbvjZ2Wkm42QsPD">

                            <div>
                                <h2
                                    class="kqgYncRJQ7spwKfig6It neyUwteEn7DOg9pBSJJE rD4HtsUG_hahmbh2Kj09 uyo8h_4Kh1IoUwm8bwJI _WfIfkoGCi0vvUrnNs4M MxQqv3Z913orO6JQGGbH g3OYBOqwXUEW4dRGogkH iZs_onKjr4U3Ijl56_Pm a0Ed69aMSu0vgf4oysz0 text-3xl">
                                    {{ $dataSiswa->nama_siswa }}
                                    <span
                                        class="_iRPzRRWy2UNkvZFG8iO _k4LlnOHrNO4Fe0v_QGs MxG1ClE4KPrIvlL5_Q5x _A6LflweZRUwrcL6M2Tk _gmxfZ2BpOHxa6nWwqBB cA4BPuqyV1eox6S0acvl AOldjxkjQirRFQcsh_FR YPSoR6AXtPgkmylUmcbT _t2wg7hRcyKsNN8CSSeU _Rz9TooiK_4jTN_Ub8Gm EwTRjGOFYqbTj4bWVQmN L6LMbQrOa1kSs_lrVR64">
                                        @if ($dataSiswa->status == 'aktif')
                                            <a href="></a>Anggota aktif
@endif
                                        @if ($dataSiswa->status == 'tidak_aktif')
Anggota tidak aktif
@endif
                                    </span>
                                </h2>
                                <span
                                    class="bg-white
                                                border border-gray-200 text-neutral-700 XklWzT8y98pp042XEQp4
                                                _A6LflweZRUwrcL6M2Tk ay0ziTPUL4Ag5d1DkSY7 neyUwteEn7DOg9pBSJJE
                                                cA4BPuqyV1eox6S0acvl AOldjxkjQirRFQcsh_FR YPSoR6AXtPgkmylUmcbT
                                                dark:bg-primary-200 dark:text-primary-800 _9OKVeTXzfSwD_NYO6_G
                                                F4SPvvqykwH_AGlVvGqN text-md">
                                                {{-- <svg class="b7Lf_ucBvHbZEidPjF8t hDwBtOhIf4ji_OJlxtQ5 Har7ksLdj_gpHuS5dC3P"
                                                    aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="currentColor"
                                                        d="M23 19a4 4 0 0 1-4 4h-2v-2h2a2 2 0 0 0 0-4h-2v-2h2a4 4 0 0 1 4 4ZM9 19a4 4 0 0 1 4-4h2v2h-2a2 2 0 0 0 0 4h2v2h-2a4 4 0 0 1-4-4Z" />
                                                    <path fill="currentColor"
                                                        d="M14 18h4v2h-4zM9 5a3 3 0 1 0 3 3a3.009 3.009 0 0 0-3-3Zm0 4a1 1 0 1 1 1-1a1.003 1.003 0 0 1-1 1Zm-3.69 6A7.011 7.011 0 0 1 9 13.88a5.641 5.641 0 0 1 .778.064A5.965 5.965 0 0 1 13 13h.254A9.398 9.398 0 0 0 9 11.89c-2.03 0-6 1.07-6 3.58V17h4.349a5.986 5.986 0 0 1 1.188-2Z" />
                                                    <path fill="currentColor"
                                                        d="M16 2h-4.18a2.988 2.988 0 0 0-5.64 0H2a2.006 2.006 0 0 0-2 2v14a2.006 2.006 0 0 0 2 2h5.141a3.606 3.606 0 0 1 0-2H2V4h14v9h2V4a2.006 2.006 0 0 0-2-2ZM9 3.25a.756.756 0 0 1-.75-.75a.75.75 0 0 1 1.5 0a.756.756 0 0 1-.75.75Z" />
                                                </svg> --}}
                                                @if ($dataSiswa->status == 'aktif')
                                                    Aktif
                                                @endif
                                                @if ($dataSiswa->status == 'tidak_aktif')
                                                    Tidak aktif
                                                @endif
                                    </span>
                            </div>
                        </div>
                        <dl
                            class="kqgYncRJQ7spwKfig6It neyUwteEn7DOg9pBSJJE _9OKVeTXzfSwD_NYO6_G ZLpoEVbvjZ2Wkm42QsPD F4SPvvqykwH_AGlVvGqN">
                            <div>
                                <dt class="BWabIWdbZ5qWNbPXxuBc">Email</dt>
                                <dd class="kqgYncRJQ7spwKfig6It neyUwteEn7DOg9pBSJJE g3OYBOqwXUEW4dRGogkH a0Ed69aMSu0vgf4oysz0">
                                    <svg class="kbeH5ty3CtPKxXm5TXph eVNhx7m5tjSVbfYQzDdT rd9r00vboqD3jj2DVT_m rZZ58B08lxezTX7iNgGT jt7K__cy_iHy7aMDMaLx"
                                        aria-hidden="true" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19 8.27q-1.038 0-1.77-.732q-.73-.73-.73-1.769q0-1.038.73-1.769q.732-.73 1.77-.73t1.77.73q.73.73.73 1.77q0 1.038-.73 1.768q-.732.731-1.77.731ZM4.615 19q-.69 0-1.152-.462Q3 18.075 3 17.385V6.615q0-.69.463-1.152Q3.925 5 4.615 5h9.947q-.043.25-.052.49q-.01.24.013.51q.04.762.315 1.44t.735 1.222L12 11L4.308 6L4 6.885l8 5.23l4.313-2.819q.54.458 1.225.716q.685.257 1.462.257q.512 0 1.027-.125q.515-.125.973-.375v7.616q0 .69-.462 1.152q-.463.463-1.153.463H4.615Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="LYMps1kO2vF8HBymW3az">{{ $dataSiswa->email }}</span>
                                </dd>
                            </div>
                            <div>
                                <dt class="BWabIWdbZ5qWNbPXxuBc">Call</dt>
                                <dd class="kqgYncRJQ7spwKfig6It neyUwteEn7DOg9pBSJJE g3OYBOqwXUEW4dRGogkH a0Ed69aMSu0vgf4oysz0">
                                    <svg class="kbeH5ty3CtPKxXm5TXph eVNhx7m5tjSVbfYQzDdT rd9r00vboqD3jj2DVT_m rZZ58B08lxezTX7iNgGT jt7K__cy_iHy7aMDMaLX"
                                        aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M19.506 7.96A16.027 16.027 0 0 1 7.96 19.506C5.819 20.051 4 18.21 4 16v-1c0-.552.449-.995.998-1.05a9.94 9.94 0 0 0 2.656-.639l1.52 1.52a12.049 12.049 0 0 0 5.657-5.657l-1.52-1.52a9.94 9.94 0 0 0 .64-2.656C14.005 4.448 14.448 4 15 4h1c2.21 0 4.051 1.819 3.506 3.96"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="LYMps1kO2vF8HBymW3az">{{ $dataSiswa->no_telp }}</span>
                                </dd>
                            </div>
                        </dl>

                        <dl>
                            <dt
                                class="rD4HtsUG_hahmbh2Kj09 LYMps1kO2vF8HBymW3az MxQqv3Z913orO6JQGGbH g3OYBOqwXUEW4dRGogkH a0Ed69aMSu0vgf4oysz0">
                                Kelas dan Jurusan
                            </dt>
                            <dd
                                class="_9OKVeTXzfSwD_NYO6_G XdjN1uxS_rsa3F90ox40 K1PPCJwslha8GUIvV_Cr F4SPvvqykwH_AGlVvGqN eCx_6PNzncAD5yo7Qcic">
                                {{ $dataSiswa->kelas->kelas }} / {{ $dataSiswa->jurusan->jurusan }}


                            </dd>
                            {{-- <dt
                                class="rD4HtsUG_hahmbh2Kj09 LYMps1kO2vF8HBymW3az MxQqv3Z913orO6JQGGbH g3OYBOqwXUEW4dRGogkH a0Ed69aMSu0vgf4oysz0">
                                Tanggal diterima
                            </dt>
                            <dd
                                class="ay0ziTPUL4Ag5d1DkSY7 neyUwteEn7DOg9pBSJJE _9OKVeTXzfSwD_NYO6_G pz8Hkt0c6QoT_d0LgJ4L F4SPvvqykwH_AGlVvGqN">

                            </dd> --}}

                        </dl>
                        {{-- <dl>
                            <dt
                                class="rD4HtsUG_hahmbh2Kj09 LYMps1kO2vF8HBymW3az MxQqv3Z913orO6JQGGbH g3OYBOqwXUEW4dRGogkH a0Ed69aMSu0vgf4oysz0">
                                Alamat E-mail
                            </dt>
                            <dd
                                class="_9OKVeTXzfSwD_NYO6_G XdjN1uxS_rsa3F90ox40 K1PPCJwslha8GUIvV_Cr F4SPvvqykwH_AGlVvGqN eCx_6PNzncAD5yo7Qcic">
                                {{ $dataSiswa->email }}
                            </dd>
                            <dt
                                class="rD4HtsUG_hahmbh2Kj09 LYMps1kO2vF8HBymW3az MxQqv3Z913orO6JQGGbH g3OYBOqwXUEW4dRGogkH a0Ed69aMSu0vgf4oysz0">
                                Nomor Telepon
                            </dt>
                            <dd
                                class="_9OKVeTXzfSwD_NYO6_G XdjN1uxS_rsa3F90ox40 K1PPCJwslha8GUIvV_Cr F4SPvvqykwH_AGlVvGqN eCx_6PNzncAD5yo7Qcic">
                                {{ $dataSiswa->no_telp }}
                            </dd>
                        </dl> --}}
                    </div>

                </div>
                <div
                    class="kqgYncRJQ7spwKfig6It neyUwteEn7DOg9pBSJJE veFXkDzfJN473U3ycrV8 ZLpoEVbvjZ2Wkm42QsPD justify-end items-end">
                    <a href="{{ route('anggota.data.edit', $dataSiswa->nis) }}">
                        <button type="button"
                            class="_gKcj49wZgnwx1LpcJi6 bFARDnno0HUtfhktTXfR MxG1ClE4KPrIvlL5_Q5x _A6LflweZRUwrcL6M2Tk g3OYBOqwXUEW4dRGogkH qHIOIw8TObHgD3VvKa5x yjGyQxv8jnYk9_MGMqLN _Qk4_E9_iLqcHsRZZ4ge PWreZZgitgAm_Nv4Noh9 pxHuWvF853ck68OLN6ef DpMPWwlSESiYA8EE1xKM hover:text-primary-700 m_8FxTcpOfmK___hAaJ6 _FONMPVaCsLFJJGDaaIL _bKyZ1er5YE_NnrwOCm9 __8kBLtrR_iuU2wW25Lp _cpMMPjFQqjJu4i0Puod eCx_6PNzncAD5yo7Qcic _BIVSYBXQUqEf_ltPrSk DTyjKhtXBNaebZa5L0l9 _OovBxfPdK7Rjv2nh2Ot bg-green-500 text-white hover:bg-green-600 hover:text-white">
                            Edit
                        </button>
                    </a>
                    <a href="{{ route('anggota.data.delete', $dataSiswa->nis) }}"
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $dataSiswa->nis }}').submit();">
                        <button type="button"
                            class="ay0ziTPUL4Ag5d1DkSY7 neyUwteEn7DOg9pBSJJE wP9HMsqy6b96l2HBRbgb Zu2uxbh1a3K15C3L1Fua bCOE0bgQ1o9G1KIIEPpP _FONMPVaCsLFJJGDaaIL qHIOIw8TObHgD3VvKa5x lMd1Mk1iy9t7Qixg4Cix _A6LflweZRUwrcL6M2Tk _Qk4_E9_iLqcHsRZZ4ge MxG1ClE4KPrIvlL5_Q5x bFARDnno0HUtfhktTXfR _gKcj49wZgnwx1LpcJi6 _F_1gdhzusC6tSOWHtx_ _gqjjUN8zzr720d_O4Od hFk3nYxL7TO2dLYK_eq4 TWiXrTE5RGctRatr5xR4">
                            <svg aria-hidden="true"
                                class="eUuXwBkW5W4__eatjSfd RRXFBumaW2SHdseZaWm6 rd9r00vboqD3jj2DVT_m wikskPDYEBn0nlvDss8h"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Hapus
                        </button>
                    </a>
                    <form id="delete-form-{{ $dataSiswa->nis }}"
                        action="{{ route('anggota.data.delete', $dataSiswa->nis) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </section>
    @endisset
@endsection
