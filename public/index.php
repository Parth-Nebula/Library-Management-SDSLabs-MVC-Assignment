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
    "/goTouserLoginpage" => "\Controller\User\LoginPage" ,
    "/goTouserRegisterpage" => "\Controller\User\RegisterPage" ,
    "/registerUser" => "\Controller\User\Register" ,
    "/loginUser" => "\Controller\User\Login" ,
    "/logoutUser" => "\Controller\User\Logout" ,
    "/goTouserPortal" => "\Controller\User\UserPortal" ,
    "/goTouserRequestbookspage" => "\Controller\User\RequestBooksPage" ,
    "/makeArequest" => "\Controller\User\RequestBook" ,
    "/goTouserRequestedbookspage" => "\Controller\User\RequestedBooksPage" ,
    "/completeRequest" => "\Controller\User\CompleteRequest" ,
    "/goTouserReturnbookspage" => "\Controller\User\ReturnBooksPage" ,
    "/makeAreturn" => "\Controller\User\ReturnBook" ,
    "/goTouserHistorypage" => "\Controller\User\HistoryPage" ,
    "/goToadminLoginpage" => "\Controller\Admin\LoginPage" ,
    "/goToadminRegisterpage" => "\Controller\Admin\RegisterPage" ,
    "/registerAdmin" => "\Controller\Admin\Register" ,
    "/loginAdmin" => "\Controller\Admin\Login" ,
    "/logoutAdmin" => "\Controller\Admin\Logout" ,
    "/goToadminPortal" => "\Controller\Admin\AdminPortal" ,
    "/goToadminRequestissuespage" => "\Controller\Admin\RequestIssuePage" ,
    "/actOnaRequest" => "\Controller\Admin\ActOnARequest" ,
    "/goToadminRequestadminspage" => "\Controller\Admin\RequestAdminsPage" ,
    "/approveAnadmin" => "\Controller\Admin\ApproveAnAdmin" ,
    "/goToadminBooksgivepage" => "\Controller\Admin\BooksGivePage" ,
    "/giveAbook" => "\Controller\Admin\GiveABook" ,
    "/goToadminBookstakepage" => "\Controller\Admin\BooksTakePage" ,
    "/takeAbook" => "\Controller\Admin\TakeABook" ,
    "/goToadminBooksaddpage" => "\Controller\Admin\BooksAddPage" ,
    "/addBooks" => "\Controller\Admin\AddBooks" ,
    "/goToadminBooksremovepage" => "\Controller\Admin\BooksRemovePage" ,
    "/removeAbook" => "\Controller\Admin\RemoveBooks" ,
));