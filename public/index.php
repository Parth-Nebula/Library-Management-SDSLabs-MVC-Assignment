<?php
require __DIR__."/../vendor/autoload.php" ;
ToroHook::add("404",  function() 
{
    header('HTTP/1.1 404 Not Found');
    echo \View\Loader::make()->render
            (  
            "templates/notFound.twig" ,
            );
    exit;
}
);
Toro::serve(array(
    "/" => "\Controller\Welcome" ,
    "/goToUserLoginPage" => "\Controller\User\LoginPage" ,
    "/goToUserRegisterPage" => "\Controller\User\RegisterPage" ,
    "/registerUser" => "\Controller\User\Register" ,
    "/loginUser" => "\Controller\User\Login" ,
    "/logoutUser" => "\Controller\User\Logout" ,
    "/goToUserPortal" => "\Controller\User\UserPortal" ,
    "/goToUserRequestBooksPage" => "\Controller\User\RequestBooksPage" ,
    "/makeARequest" => "\Controller\User\RequestBook" ,
    "/goToUserRequestedBooksPage" => "\Controller\User\RequestedBooksPage" ,
    "/completeRequest" => "\Controller\User\CompleteRequest" ,
    "/goToUserReturnBooksPage" => "\Controller\User\ReturnBooksPage" ,
    "/makeAreturn" => "\Controller\User\ReturnBook" ,
    "/goToUserHistoryPage" => "\Controller\User\HistoryPage" ,
    "/goToAdminLoginPage" => "\Controller\Admin\LoginPage" ,
    "/goToAdminRegisterPage" => "\Controller\Admin\RegisterPage" ,
    "/registerAdmin" => "\Controller\Admin\Register" ,
    "/loginAdmin" => "\Controller\Admin\Login" ,
    "/logoutAdmin" => "\Controller\Admin\Logout" ,
    "/goToAdminPortal" => "\Controller\Admin\AdminPortal" ,
    "/goToAdminRequestIssuesPage" => "\Controller\Admin\RequestIssuePage" ,
    "/actOnARequest" => "\Controller\Admin\ActOnARequest" ,
    "/goToAdminRequestAdminsPage" => "\Controller\Admin\RequestAdminsPage" ,
    "/approveAnAdmin" => "\Controller\Admin\ApproveAnAdmin" ,
    "/goToAdminBooksGivePage" => "\Controller\Admin\BooksGivePage" ,
    "/giveABook" => "\Controller\Admin\GiveABook" ,
    "/goToAdminBooksTakePage" => "\Controller\Admin\BooksTakePage" ,
    "/takeABook" => "\Controller\Admin\TakeABook" ,
    "/goToAdminBooksAddPage" => "\Controller\Admin\BooksAddPage" ,
    "/addBooks" => "\Controller\Admin\AddBooks" ,
    "/goToAdminBooksRemovePage" => "\Controller\Admin\BooksRemovePage" ,
    "/removeABook" => "\Controller\Admin\RemoveBooks" ,
));