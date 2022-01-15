<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#e8ebef">
    <tr>
        <td align="center" valign="top">
            <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #fff;">
                <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="50" align="center" valign="middle"
                                    style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000;">
                                    <h1 style="font-size: 24px; color: #000;">{{env('APP_NAME', 'eTaxPlanner')}}</h1>
                                    <hr/>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="30" align="center" valign="middle"
                                                style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000;">
                                                <p style="font-size: 18px; color: #000;">
                                                    Your OTP is {{ $otp }}. Please enter the OTP to verify your email address.

                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30" align="center" valign="middle"
                                                style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000;">
                                                <p style="font-size: 12px; color: #000;">
                                                    If you did not request for OTP, please ignore this email.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
