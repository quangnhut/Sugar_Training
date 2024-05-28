{literal}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{/literal}

<form action="" method="">

    {* title *}
    <div class="title">
        <span><img src="/modules/Study/image/sts.png" alt="sts" width="100" height="100"></span>
        <span class="company_info">
            <h2>CÔNG TY TNHH ĐẦU TƯ LEFAMI</h2>
            <h3>L17-11. Tầng 17-Tòa nhà Vincom Center - Số 72 Lê Thánh Tôn - P.Bến Nghé - Quận 1- TP.HCM</h3>
            <h3>Tel: 028 3838 9666 – email: info@stsvietnam.net</h3>
            <h3>https://stsvietnam.vn</h3>
            <h1>BÁO GIÁ</h1>
            <h1>(QUOTATION)</h1>
        </span>
        <span><img src="/modules/Study/image/konica.png" alt="konica" width="100" height="100"></span>
    </div>
    <br />
    <br />

    {* customer info *}
    <div class="customer_info">
        <p>Kinh gửi (Mr/Mrs): <strong style="color: red;">{$customer_name}</strong></p>
        <p>Công ty (Customer): <strong style="color: red;">{$customer_name}</strong></p>
        <span class="customer_vat">
            <p>Mã số KH (Code): <strong style="color: red;">{$customer_code}</strong></p>
            <p style="margin-left: 20%">Mã số thuế (VAT): <strong style="color: red;">{$tax}</strong></p>
        </span>
        <span class="customer_telephone">
            <p>Điện thoai (Tel): <strong style="color: red;">{$customer_phone}</strong></p>
            <p style="margin-left: 21%">Fax: <strong style="color: red;">{$fax}</strong></p>
        </span>
        <p>Địa chỉ (Address): <strong style="color: red;">{$address}</strong></p>
        <p>Di động (Mobile): <strong style="color: red;">{$customer_phone}</strong></p>
        <p>Căn cứ kết quả giám định kỹ thuật được thực hiện ngày <strong style="color: red;">{$date}</strong> , chúng
            tôi xin đề nghị Quý khách đồng ý cho chúng tôi tiến hành thay thế một số vật tư có dấu hiệu hư hỏng hoặc đã
            quá hạn sử dụng theo bảng liệt kê dưới đây:</p>
        <p>Basing on the result of technical inspection carried up <strong style="color: red;">{$date}</strong> , we now
            suggest you to agree with the replacement for some spare parts - which are damaged or out of lifetime - as
            the following table:</p>
        <span class="machine">
            <p>Loại máy (Model): <strong style="color: red;">{$machine}</strong></p>
            <p style="margin-left: 20%">Số S/N (Serial No.): <strong style="color: red;">{$address}</strong></p>
        </span>
        <p>KTV (Technical): <strong style="color: red;">{$machine}</strong></p>
    </div>

    {* table products *}
    <table class="product_table">
        <thead class="thead">
            <tr>
                <th>STT(No.)</th>
                <th>Tên SP(Product name)</th>
                <th>SL(Qty)</th>
                <th>Đơn giá(Price)</th>
                <th>Giảm giá(Discount)</th>
                <th>Thành tiền(Subtotal)</th>
                <th>Ghi chú(Remark)</th>
            </tr>
        </thead>
        <tbody>
            {$products}
            <tr>
                <td colspan="5">Tổng cộng (Subtotal amount):</td>
                <td id="sum_amount" style="text-align: center"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">Thuế GTGT (VAT 10%):</td>
                <td id="vat_amount" style="text-align: center"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" style="font-weight: 600;">Tổng tiền (Total amount):</td>
                <td id="total_amount" style="text-align: center"></td>
                <td></td>
            </tr>
            <tr>
                <td id="amount_by_letter" colspan="7" style="font-weight: 600;">Số tiền viết bằng chữ (Total amount in words):</td>
            </tr>
        </tbody>
    </table>

    {* footer *}
    <div class="footer">
        <p>Trong quá trình thay thế và cân chỉnh máy, nếu có vật tư khác được phát hiện là hư hỏng, xin Quý Công ty vui
            lòng cho chúng tôi được đề nghị bổ sung để đảm bảo máy hoạt động trong tình trạng tốt nhất.</p>
        <p>During replacement and adjustment process, if there are any other parts found as being damaged, please kindly
            accept our amendment to make sure your machine working in the best condition.</p>
        <br />
        <p style="margin-left: 70%">TP.HCM. Ngày..........tháng..........năm 20......</p>
        <br />

        <span class="sign">
            <p><strong>Xác nhận của khách hàng</strong></p>
            <p style="margin-left:25%; margin-right:25%"><strong>TP. Kỹ thuật</strong></p>
            <p style=""><strong>Nhân viên lập phiếu<strong></p>
        </span>
        <span class="sign">
            <p>(Confirmation of customer)</p>
            <p style="margin-left:23%; margin-right:25%">(Tech Dept Manger)</p>
            <p style="">(Operator)</p>
        </span>
    </div>

</form>


{literal}
    <script language="JavaScript" type="text/javascript">
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
            $('#amount_by_letter').html('Số tiền viết bằng chữ (Total amount in words):     ' + amount_by_letter);

            var url = document.URL;
            if(url.includes('&print=true')){
                $('#leftColumn').hide();
                $('#content').addClass('noLeftColumn');
            }

        });


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
    </script>
{/literal}



{literal}
    <style type="text/css">
        .title {
            display: flex;
        }

        .company_info {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .customer_info {
            font-size: small;
            line-height: 1.5;
        }

        .customer_vat {
            display: flex;
        }

        .customer_telephone {
            display: flex;
        }

        .machine {
            display: flex;
        }

        .product_table {
            width: 100%;
            font-size: small;
            line-height: 2;
            border: 1px solid black;
            border-collapse: collapse;

        }

        .product_table th {
            border: 1px solid black;
            border-collapse: collapse;

        }

        .product_table td {
            border: 1px solid black;
            border-collapse: collapse;

        }

        .footer {
            font-size: small;
        }

        .sign {
            display: flex;
        }
    </style>
{/literal}