Hello {{$name}}!
@if($type=='email')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <div class="">
        <div class="aHl"></div>
        <div id=":185" tabindex="-1"></div>
        <div id=":17u" class="ii gt" jslog="20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0.">
            <div id=":17t" class="a3s aiL msg-2367369311858309970"><u></u>
                <div style="margin:0;padding:0" bgcolor="#FFFFFF">
                    <table width="100%" height="100%" style="min-width:348px" border="0" cellspacing="0" cellpadding="0" lang="en">
                        <tbody>
                            <tr height="32" style="height:32px">
                                <td></td>
                            </tr>
                            <tr align="center">
                                <td>
                                    <div>
                                        <div></div>
                                    </div>
                                    <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
                                        <tbody>
                                            <tr>
                                                <td width="8" style="width:8px"></td>
                                                <td>
                                                    <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px" align="center" class="m_-2367369311858309970mdv2rw"> <img src="https://urlat.cc/file/kvhcMous"  height="80" alt="logo">
                                                        <div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                            <div style="font-size:24px">Account Confirmation</div>
                                                            <table align="center" style="margin-top:8px">
                                                                <tbody>
                                                                    <tr style="line-height:normal">
                                                                        
                                                                        <td><a style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">{{$name}}</a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Please hit the button to confirm your account with use.If button is unable to click ,remove this email from spam folder and mark it as safe then try again. <div style="padding-top:32px;text-align:center"><a href="{{url('verify/email/1')}}/{{$code}}" style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#4184f3;border-radius:5px;min-width:90px" target="_blank" data-saferedirecturl="{{url('verify/email/1')}}/{{$code}}">Confirm My Account</a></div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div style="text-align:left">
                                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
                                                            <div>You received this email to let you know about important changes to your Topatlaw Account and services.</div>
                                                            <div style="direction:ltr">© 2021 Topatlaw.com, <a class="m_-2367369311858309970afal" style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center"></a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="8" style="width:8px"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr height="32" style="height:32px">
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="yj6qo"></div>
            <div class="yj6qo"></div>
            <div class="yj6qo"></div>
            <div class="yj6qo"></div>
        </div>
        <div id=":189" class="ii gt" style="display:none">
            <div id=":18a" class="a3s aiL "></div>
        </div>
        <div class="hi"></div>
    </div>
</body>

</html>

@elseif($type=='password')
You registered an account on Top At Law ,Please reset your password by clicking on this link . <a href="{{url('password/reset/a/b/')}}/{{$code}}">Reset</a>
@endif

Kind Regards, <topatlaw class="com"></topatlaw>