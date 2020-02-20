<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use App\Model\helpdesk\Agent\Department;
use App\Model\helpdesk\Agent\Teams;
use App\Model\helpdesk\Email\Emails;
use App\Model\helpdesk\Form\Fields;
use App\Model\helpdesk\Manage\Help_topic;
use App\Model\helpdesk\Manage\Sla_plan;
use App\Model\helpdesk\Notification\Notification;
use App\Model\helpdesk\Notification\UserNotification;
use App\Model\helpdesk\Settings\Alert;
use App\Model\helpdesk\Settings\CommonSettings;
use App\Model\helpdesk\Settings\Company;
use App\Model\helpdesk\Settings\Email;
use App\Model\helpdesk\Settings\System;
use App\Model\helpdesk\Ticket\Ticket_attachments;
use App\Model\helpdesk\Ticket\Ticket_Collaborator;
use App\Model\helpdesk\Ticket\Ticket_Form_Data;
use App\Model\helpdesk\Ticket\Ticket_source;
use App\Model\helpdesk\Ticket\Ticket_Status;
use App\Model\helpdesk\Ticket\Ticket_Thread;
use App\Model\helpdesk\Ticket\Tickets;
use App\Model\helpdesk\Utility\CountryCode;
use App\Model\helpdesk\Utility\Date_time_format;
use App\Model\helpdesk\Utility\Timezones;
use App\User;
use Auth;
use Crypt;
use DB;
use Exception;
// classes
use GeoIP;
use Hash;
use Illuminate\support\Collection;
use Input;
use Lang;
use Mail;
use PDF;
use UTC;

class TestController extends Controller
{
    public function index () {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjdmZTk3NWViNDNlYjZmZDEyYzBkZGEzOWViZDc0MmZiZmQ1NTQxZmFhOTcyOTkxNjdjYmE5ZjdhZTBjZjEzZjJiYTk0MDVhOThiOTk4NWE5In0.eyJhdWQiOiIxIiwianRpIjoiN2ZlOTc1ZWI0M2ViNmZkMTJjMGRkYTM5ZWJkNzQyZmJmZDU1NDFmYWE5NzI5OTE2N2NiYTlmN2FlMGNmMTNmMmJhOTQwNWE5OGI5OTg1YTkiLCJpYXQiOjE1NzkyMjQ1NzEsIm5iZiI6MTU3OTIyNDU3MSwiZXhwIjoxNjEwODQ2OTcxLCJzdWIiOiIyMDIiLCJzY29wZXMiOltdfQ.vdj6hVZm2nQTj_eNte6Kko1xD7sJY1PNcy_eyVuLbY32gJ1b6W2D_mxNxoEOXnFoNjqY0etF9RiM0NbjuLmWtBnWFNaD4S87N1Sk0ou5sk9kSjoWwRoUOWa1XI54TSP_pcbMISkdeylEcSEt77Hxy28Kpe63hCIWaJ_0KIbOwFni_GnP3K2U8WTnZRck9kCFV9wsUuN-nOeD9rMessLarik0k7Ja3AxXW5FtDXB6cOAR8v_e5HQJfQdoJdoXtsadqsIf6Aj0kOu_1ZQe7dOr9itqSf8WNBcdw5wXZ6e9cRf-aJOwI_Bi34mGc63FJre8u6eVrB7p-3_V3jPfzlKLqKn3WuEQrirq1DUkM2pus2r_Yhvt0NjL6VQqfrWgKZ0kFCGELl5nIkz25ldsZINclKuCYzehJJ7tdMitddqYFsZAZCjGwvUU7qIxn-G7Ppg41z0mJmd8exnC4GQ2fINu17DLL5-gl8tDxz3LQZhQODQcgSQF7a2SwZJqLOQx0tYPg3CqBU8MgG-yqsiCNrE3zcNU-qK3DNcxLR6HiI6R85XJ87-Bt9ssQW_yTzSpvb2JltA5aBTVeiinkakCQxSP4KeiZEKCFTbIaXPscxZQHYKv-1O66w6LQ1qF31tdT7KEAuZp-1ynL9ATReewf_POiITKZzbYcw57bGFU2HXPlC4';
                
        $url = 'http://snipeit.ad.aiac.world/api/v1/';
        $client = new Client(['base_uri' => $url]);
        
        $headers = [
            'Authorization' => 'Bearer ' . $token,        
            'Accept'        => 'application/json',
        ];        
        
        $hardwareList = $client->request('GET', 'hardware', [
            'headers' => $headers
        ]);

        $userList = $client->request('GET', 'users', [
            'headers' => $headers
        ]);
        
        //$datas = $response->getBody()->getContents();  
        
        //$xml = new \SimpleXMLElement($datas);       
        
        $hardwares = json_decode($hardwareList->getBody(), true);

        $user = json_decode($userList->getBody(), true);

        $avg = DB::table('ticket_thread')->where('ticket_id', '=', 1)->get();

        dd($avg);

        //$datas = sort($datas["rows"]);

        return $hardwares;

        //$datas = $response->getBody();
        
        //$decoded = json_decode($datas);
        
        //return $datas;
        
        //dd($datas);
        
        //var_dump($datas);
        
        //$babi = $datas->rows;
        
        //return view('test', compact('datas', $datas['rows']));   
        
        //return view('test', compact(['client' => $datas]));   
        
        //return $datas;
        
        //foreach($xml as $xmlsmall) {
        //    echo $xmlsmall;
        //}

        //return view('test')->with('datas', $clientes['items']);

    }
}
