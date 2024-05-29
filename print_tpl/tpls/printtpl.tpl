{literal}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="modules/Student/js/printtpl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
{/literal}

<form action="" method="">

    {* title *}
    {* <div class="title">
        <span><img src="/modules/Student/image/sts.png" alt="sts" width="60" height="60"></span>
        <span class="company_info">
            <h2 style="color: red;">CÔNG TY TNHH ĐẦU TƯ LEFAMI</h2>
            <h3 style="color: red;">L17-11. Tầng 17-Tòa nhà Vincom Center - Số 72 Lê Thánh Tôn - P.Bến Nghé - Quận 1 - TP.HCM</h3>
            <h3>Tel: 028 3838 9666 – email: info@stsvietnam.net</h3>
            <h3><a href="https://stsvietnam.vn">https://stsvietnam.vn</a></h3>
            <h1 style="color: red;">BÁO GIÁ</h1>
            <h1>(QUOTATION)</h1>
        </span>
        <span><img src="/modules/Student/image/konica.png" alt="konica" width="80" height="60"></span>
    </div>
    <br />
    <br /> *}

    <table class="table_title" id="table_title">
        <tbody>
            <tr class="tr_title">
                <td colspan="7" style="color: red; font-weight: 600; font-size:larger">CÔNG TY TNHH ĐẦU TƯ LEFAMI</td>
            </tr>
            <tr class="tr_title">
                <td colspan="7" style="color: red;">L17-11. Tầng 17-Tòa nhà Vincom Center - Số 72 Lê Thánh Tôn - P.Bến Nghé - Quận 1 - TP.HCM</td>
            </tr>
            <tr class="tr_title">
                <td colspan="7">Tel: 028 3838 9666 – email: info@stsvietnam.net</td>
            </tr>
            <tr class="tr_title">
                <td colspan="7" style="color: blue;">https://stsvietnam.vn</td>
            </tr>
            <tr class="tr_title">
                <td colspan="7" style="color: red; font-weight: 600">BÁO GIÁ</td>
            </tr>
            <tr class="tr_title">
                <td colspan="7">(QUOTATION)</td>
            </tr>
            <tr>
                <td>" "</td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>

            <tr style="text-align: left;">
                <td>Kinh gửi (Mr/Mrs): {$customer_name}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: left;">
                <td>Công ty (Customer): {$customer_name}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: left;">
                <td style="width: 30%;">Mã số KH (Code): {$customer_code}</td>
                <td></td>
                <td>Mã số thuế (VAT): {$tax}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: left;">
                <td style="width: 30%;">Điện thoai (Tel): {$customer_phone}</td>
                <td></td>
                <td>Fax: {$fax}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: left;">
                <td>Địa chỉ (Address): {$address}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: left;">
                <td>Di động (Mobile): {$customer_phone}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: left;">
                <td colspan="7">Căn cứ kết quả giám định kỹ thuật được thực hiện ngày {$date}, chúng tôi xin đề nghị Quý khách đồng ý cho chúng tôi tiến hành thay thế một số vật tư có dấu hiệu hư hỏng hoặc đã quá hạn sử dụng theo bảng liệt kê dưới đây:</td>
            </tr>
            <tr style="text-align: left;">
                <td colspan="7">Basing on the result of technical inspection carried up {$date}, we now suggest you to agree with the replacement for some spare parts - which are damaged or out of lifetime - as the following table:</td>
            </tr>
            <tr style="text-align: left;">
                <td style="width: 30%;">Loại máy (Model): {$machine}</td>
                <td></td>
                <td>Số S/N (Serial No.): {$address}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: left;">
                <td>KTV (Technical): {$machine}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>" "</td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>

            <tr class="tr_demo">
                <td>STT(No.)</td>
                <td>Tên SP(Product name)</td>
                <td>SL(Qty)</td>
                <td>Đơn giá(Price)</td>
                <td>Giảm giá(Discount)</td>
                <td>Thành tiền(Subtotal)</td>
                <td>Ghi chú(Remark)</td>
            </tr>

            {$products}

            <tr class="tr_demo">
                <td colspan="5">Tổng cộng (Subtotal amount):</td>
                <td id="sum_amount"></td>
                <td></td>
            </tr>
            <tr class="tr_demo">
                <td colspan="5">Thuế GTGT (VAT 10%):</td>
                <td id="vat_amount"></td>
                <td></td>
            </tr>
            <tr class="tr_demo">
                <td colspan="5" style="font-weight: 600;">Tổng tiền (Total amount):</td>
                <td id="total_amount"></td>
                <td></td>
            </tr>
            <tr class="tr_demo">
                <td id="amount_by_letter" colspan="7" style="font-weight: 600;">Số tiền viết bằng chữ (Total amount in words):</td>
            </tr>

            <tr>
                <td>" "</td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr style="text-align: left;">
                <td colspan="7">Trong quá trình thay thế và cân chỉnh máy, nếu có vật tư khác được phát hiện là hư hỏng, xin Quý Công ty vui lòng cho chúng tôi được đề nghị bổ sung để đảm bảo máy hoạt động trong tình trạng tốt nhất.</td>
            </tr>
            <tr style="text-align: left;">
                <td colspan="7">During replacement and adjustment process, if there are any other parts found as being damaged, please kindly accept our amendment to make sure your machine working in the best condition.
                </td>
            </tr>

            <tr>
                <td>" "</td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr style="text-align: left;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>TP.HCM. Ngày.......tháng.......năm</td>
                <td>20......</td>
            </tr>
            <tr>
                <td>" "</td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr style="text-align: left;">
                <td>Xác nhận của khách hàng</td>
                <td></td>
                <td>TP. Kỹ thuật</td>
                <td></td>
                <td></td>
                <td>Nhân viên lập phiếu</td>
                <td></td>
            </tr>

        </tbody>
    </table>
</form>


{* table products *}
{* <table class="product_table" id="product_table">
        <thead class="thead">
            <tr class="tr_demo">
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
            <tr class="tr_demo">
                <td colspan="5">Tổng cộng (Subtotal amount):</td>
                <td id="sum_amount" style="text-align: center"></td>
                <td></td>
            </tr>
            <tr class="tr_demo">
                <td colspan="5">Thuế GTGT (VAT 10%):</td>
                <td id="vat_amount" style="text-align: center"></td>
                <td></td>
            </tr>
            <tr class="tr_demo">
                <td colspan="5" style="font-weight: 600;">Tổng tiền (Total amount):</td>
                <td id="total_amount" style="text-align: center"></td>
                <td></td>
            </tr>
            <tr class="tr_demo">
                <td id="amount_by_letter" colspan="7" style="font-weight: 600;">Số tiền viết bằng chữ (Total amount in words):</td>
            </tr>
        </tbody>
    </table>
    </br> *}



{literal}
    <style type="text/css">
        .table_title {
            font-family: "Times New Roman", Times, serif;
            width: 100%;
            text-align: center;
            font-size: medium;
            margin-bottom: 2%;
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
            font-family: "Times New Roman", Times, serif;

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

        .span_general {
            display: flex;
        }

        .tr_demo {
            text-align: left;
        }

        .tr_demo td {
        /* border: 1px solid black;
        border-collapse: collapse; */
        border : inset;
        }

    </style>
{/literal}