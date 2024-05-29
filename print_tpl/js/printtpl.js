
$(document).ready(function() {

    var amounts = document.getElementsByClassName('amount');
    var sumAmount = 0;
    for (var i = 0; i < amounts.length; i++) {
        sumAmount += parseFloat(amounts[i].innerHTML);
    }
    var vat_amount = sumAmount / 10;
    var totalAmount = sumAmount - vat_amount;
    var amount_by_letter = DocTienBangChu(totalAmount);

    $('#sum_amount').html(sumAmount.toFixed(2));
    $('#vat_amount').html(vat_amount.toFixed(2));
    $('#total_amount').html(totalAmount.toFixed(2));
    $('#amount_by_letter').html(
        'Số tiền viết bằng chữ (Total amount in words): ' + amount_by_letter);

    var url = document.URL;
    if (url.includes('&print=true')) {
        $('#leftColumn').hide();
        $('#content').addClass('noLeftColumn');
    }

    $('.tr_demo').css('border', '1 solid black');

    // ExportCSV();
    var workbook = tableToWorkbook();
    // downloadExcel(workbook, 'lefami.xlsx')

});


function ExportCSV() {
    let table_csv = [];
    let rows = document.getElementsByClassName('tr_demo');
    for (let i = 0; i < rows.length; i++) {
        let cols = rows[i].querySelectorAll('td,th');
        let csvrow = [];
        for (let j = 0; j < cols.length; j++) {
            csvrow.push(cols[j].innerHTML);
        }
        table_csv.push(csvrow.join(","));
    }
    table_csv = table_csv.join('\n');
    var title_csv = tilteToCSV();
    var customer_info_csv = customerInfoToCSV();
    var footer_csv = footerToCSV();

    var full_csv = title_csv.concat(customer_info_csv, table_csv, footer_csv);
    // console.log(full_csv);
    downloadCSVFile(full_csv);

}

function tilteToCSV() {
    let csv_title = [];
    let rows_title = document.getElementsByClassName('tr_title');
    for (let i = 0; i < rows_title.length; i++) {
        let cols_title = rows_title[i].querySelectorAll('td');
        let csvrow_title = [];
        for (let j = 0; j < cols_title.length; j++) {
            csvrow_title.push(cols_title[j].innerHTML);
        }
        csv_title.push(csvrow_title.join(","));
    }
    csv_title = csv_title.join('\n');

    return csv_title;
}

function customerInfoToCSV() {
    let csv_data = [];
    let rows = document.getElementsByClassName('customer_info');
    for (let i = 0; i < rows.length; i++) {
        let cols = rows[i].querySelectorAll('p, strong');
        let csvrow = [];
        for (let j = 0; j < cols.length; j++) {
            csvrow.push(cols[j].innerHTML + "\n");
        }
        csv_data.push(csvrow.join(","));
    }
    csv_data = csv_data.join('\n');

    return csv_data;
}


function footerToCSV() {
    let csv_data = [];
    let rows = document.getElementsByClassName('footer');
    for (let i = 0; i < rows.length; i++) {
        let cols = rows[i].querySelectorAll('p, strong');
        let csvrow = [];
        for (let j = 0; j < cols.length; j++) {
            csvrow.push(cols[j].innerHTML + "\n");
        }
        csv_data.push(csvrow.join(","));
    }
    csv_data = csv_data.join('\n');

    return csv_data;
}

function downloadCSVFile(csv_data) {
    var universalBOM = "\uFEFF";
    let temp_link = document.createElement('a');
    temp_link.setAttribute('href', 'data:text/csv; charset=utf-8,' + encodeURIComponent(universalBOM + csv_data));
    temp_link.setAttribute('download', 'lefami.csv');

    temp_link.style.display = "none";
    document.body.appendChild(temp_link);

    temp_link.click();
    document.body.removeChild(temp_link);
}

function tableToWorkbook() {
    var table1 = document.getElementById('table_title');

    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.table_to_sheet(table1);
    console.log(worksheet);

    // Apply colors to the cells
    const range = XLSX.utils.decode_range(worksheet['!ref']);
    for (let R = range.s.r; R <= range.e.r; ++R) {
        for (let C = range.s.c; C <= range.e.c; ++C) {
            const cellAddress = { c: C, r: R };
            const cellRef = XLSX.utils.encode_cell(cellAddress);

            if (!worksheet[cellRef]) continue;
            worksheet[cellRef].s = {
                fill: {
                    fgColor: { rgb: "FFFF00" } // Example: Yellow background color
                }
            };
        }
    }

    XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');
    return workbook;
}

function downloadExcel(workbook, filename) {
    XLSX.writeFile(workbook, filename);
}


var ChuSo = new Array(" không ", " một ", " hai ", " ba ", " bốn ", " năm ", " sáu ", " bảy ", " tám ", " chín ");
var Tien = new Array("", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ");

function DocSo3ChuSo(baso) {
    var tram;
    var chuc;
    var donvi;
    var KetQua = "";
    tram = parseInt(baso / 100);
    chuc = parseInt((baso % 100) / 10);
    donvi = baso % 10;
    if (tram == 0 && chuc == 0 && donvi == 0) return "";
    if (tram != 0) {
        KetQua += ChuSo[tram] + " trăm ";
        if ((chuc == 0) && (donvi != 0)) KetQua += " linh ";
    }
    if ((chuc != 0) && (chuc != 1)) {
        KetQua += ChuSo[chuc] + " mươi";
        if ((chuc == 0) && (donvi != 0)) KetQua = KetQua + " linh ";
    }
    if (chuc == 1) KetQua += " mười ";
    switch (donvi) {
        case 1:
            if ((chuc != 0) && (chuc != 1)) {
                KetQua += " mốt ";
            } else {
                KetQua += ChuSo[donvi];
            }
            break;
        case 5:
            if (chuc == 0) {
                KetQua += ChuSo[donvi];
            } else {
                KetQua += " lăm ";
            }
            break;
        default:
            if (donvi != 0) {
                KetQua += ChuSo[donvi];
            }
            break;
    }
    return KetQua;
}

function DocTienBangChu(SoTien) {
    var lan = 0;
    var i = 0;
    var so = 0;
    var KetQua = "";
    var tmp = "";
    var ViTri = new Array();
    if (SoTien < 0) return "Số tiền âm !";
    if (SoTien == 0) return "Không đồng !";
    if (SoTien > 0) {
        so = SoTien;
    } else {
        so = -SoTien;
    }
    if (SoTien > 8999999999999999) {
        //SoTien = 0;
        return "Số quá lớn!";
    }
    ViTri[5] = Math.floor(so / 1000000000000000);
    if (isNaN(ViTri[5]))
        ViTri[5] = "0";
    so = so - parseFloat(ViTri[5].toString()) * 1000000000000000;
    ViTri[4] = Math.floor(so / 1000000000000);
    if (isNaN(ViTri[4]))
        ViTri[4] = "0";
    so = so - parseFloat(ViTri[4].toString()) * 1000000000000;
    ViTri[3] = Math.floor(so / 1000000000);
    if (isNaN(ViTri[3]))
        ViTri[3] = "0";
    so = so - parseFloat(ViTri[3].toString()) * 1000000000;
    ViTri[2] = parseInt(so / 1000000);
    if (isNaN(ViTri[2]))
        ViTri[2] = "0";
    ViTri[1] = parseInt((so % 1000000) / 1000);
    if (isNaN(ViTri[1]))
        ViTri[1] = "0";
    ViTri[0] = parseInt(so % 1000);
    if (isNaN(ViTri[0]))
        ViTri[0] = "0";
    if (ViTri[5] > 0) {
        lan = 5;
    } else if (ViTri[4] > 0) {
        lan = 4;
    } else if (ViTri[3] > 0) {
        lan = 3;
    } else if (ViTri[2] > 0) {
        lan = 2;
    } else if (ViTri[1] > 0) {
        lan = 1;
    } else {
        lan = 0;
    }
    for (i = lan; i >= 0; i--) {
        tmp = DocSo3ChuSo(ViTri[i]);
        KetQua += tmp;
        if (ViTri[i] > 0) KetQua += Tien[i];
        if ((i > 0) && (tmp.length > 0)) KetQua += ','; //&& (!string.IsNullOrEmpty(tmp))
    }
    if (KetQua.substring(KetQua.length - 1) == ',') {
        KetQua = KetQua.substring(0, KetQua.length - 1);
    }
    KetQua = KetQua.substring(1, 2).toUpperCase() + KetQua.substring(2) + ' đồng';
    return KetQua; //.substring(0, 1);//.toUpperCase();// + KetQua.substring(1);
}