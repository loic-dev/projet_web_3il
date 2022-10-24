<?php function json_response($code = 200, $message = null)
{
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
        );
    // ok, validation error, or failure
    header("Status: {$status[$code]}");
    // return the encoded json
    return json_encode(array(
        'status' => $code < 300, // success or not?
        'message' => $message
        ));
}

?>