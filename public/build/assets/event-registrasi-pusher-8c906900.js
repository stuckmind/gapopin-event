import{e as a,S as r}from"./sweetalert2.esm.all-97906015.js";a.channel("registrasi-channel").listen("RegistrasiSendEvent",t=>{console.log("Registrasi baru:",t.registrasi);const e=document.querySelector("tbody");if(!e)return;const s=document.createElement("tr");s.innerHTML=`
            <td class="px-4 py-3"><span class="inline-block w-3 h-3 bg-green-500 rounded-full animate-pulse"></span></td>
            <td class="px-4 py-3 font-semibold text-gray-800">${t.registrasi.nama}</td>
            <td class="px-4 py-3 text-gray-600 capitalize">${t.registrasi.kategori??"-"}</td>
            <td class="px-4 py-3 text-gray-600">${t.registrasi.nama_optik??"-"}</td>
            <td class="px-4 py-3 text-gray-600">${t.registrasi.email??"-"}</td>
            <td class="px-4 py-3 text-gray-600">${t.registrasi.no_whatsapp??"-"}</td>
            <td class="px-4 py-3 text-gray-600">${t.registrasi.wilayah??"-"}</td>
            <td class="px-4 py-3 text-gray-600">
                ${new Date(t.registrasi.created_at).toLocaleString("id-ID")}
            </td>
            <td class="px-4 py-3 text-center">
                <span class="inline-flex items-center bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Belum Hadir
                </span>
            </td>
            <td class="px-4 py-3 text-center">
                <button type="button"
                    class="inline-flex items-center gap-1 bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded-md text-xs font-semibold transition cursor-not-allowed">
                    <i class="fa-solid fa-print"></i> Print
                </button>
            </td>
        `,e.prepend(s),r.fire({toast:!0,position:"top-end",icon:"success",title:"Registrasi baru diterima!",text:`${t.registrasi.nama} (${t.registrasi.nama_optik})`,showConfirmButton:!1,timer:4e3,timerProgressBar:!0,background:"#fff"})});
