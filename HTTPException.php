<?php 

    namespace Hildegar\FastPHP\HTTPException;

    class HTTPException {

        public static function setHeader($status_code) {
            switch ($status_code) {
                case '200':
                    header('HTTP/1.0 200 Ok');
                    break;
                case '201':
                    header('HTTP/1.0 201 Created');
                    break;
                case '204':
                    header('HTTP/1.0 204 No Content');
                    break;
                case '400':
                    header('HTTP/1.0 400 Bad Request');
                    break;
                case '401':
                    header('HTTP/1.0 401 Unauthorized');
                    break;
                case '404':
                    header('HTTP/1.0 404 Not Found');
                    break;
                case '409':
                    header('HTTP/1.0 409 Conflict');
                    break;
                case '500':
                    header('HTTP/1.0 500 Internal Server Error');
                    break;
            }
        }

        public static function raiseException($status_code) {
            HTTPException::setHeader($status_code);
        }

    }