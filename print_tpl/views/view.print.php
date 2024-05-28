<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.edit.php');

class Viewprint extends SugarView
{
    function Viewprint()
    {
        parent::SugarView();
    }

    function display()
    {
        global $db, $current_user, $app_list_strings;

        $sql = 'SELECT name, average_point_final, phone, address, email, phone_parent, date_modified, photo FROM student where name ="hoc sinh 01" and deleted = 0';
        $res = $db->query($sql);
        $row = $db->fetchByAssoc($res);
        $customer_name = $row['name'];
        $customer_code = $row['phone'];
        $customer_phone = $row['phone'];
        $tax = $row['phone_parent'];
        $fax = $row['email'];
        $address = $row['address'];
        $date = $row['date_modified'];
        $machine = $row['photo'];

        $products = $this->GetAllData($db);


        $smart = new Sugar_Smarty();
        $smart->assign('customer_name',$customer_name);
        $smart->assign('customer_code',$customer_code);
        $smart->assign('customer_phone',$customer_phone);
        $smart->assign('tax',$tax);
        $smart->assign('fax',$fax);
        $smart->assign('address',$address);
        $smart->assign('date',$date);
        $smart->assign('machine',$machine);
        $smart->assign('products',$products);



        $smart->display('modules/Study/tpls/printtpl.tpl');
    }

    function GetAllData($db){
        global $current_user, $app_list_strings;

        $sql = 'SELECT name, average_point_final, phone, rating FROM student where deleted = 0';
        $res = $db->query($sql);
        $count_row = $db->getRowCount($res);
        $html = '';
        $count = 1;

            while($row = $db->fetchByAssoc($res)){
                $amount = (float)$row['phone'] * (float)$row['average_point_final'];

                $html.='<tr>';
                $html.='<td style="text-align: center">' .$count.' </td>';
                $html.='<td style="text-align: center">' .$row['name'].' </td>';
                $html.='<td style="text-align: center">' .$row['phone'].' </td>';
                $html.='<td style="text-align: center">' .$row['average_point_final'].' </td>';
                $html.='<td style="text-align: center">0</td>';
                $html.='<td class="amount" style="text-align: center">'.$amount.'</td>';
                $html.='<td style="text-align: center">'.$row['rating'].'</td>';
                $html.='</tr>';
                $count +=1;

            }
            return $html;



    }
    




}
