<!-- <header> -->

<?php
$className = 'fnt-col';

if (count($_GET) == 0) {
    $className = 'red';
} else {
    switch ($_GET['pages']) {
        case '':
            $className = 'red';
            break;
        default:
            $className = 'fnt-col';
    }
}
?>

<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary bg-col px-5 py-3">
    <div class="container-fluid">
        <img src="../assets/FC_LOGO.png" alt="FC Logo" height="50px" class="" />
        <button class="navbar-toggler" type="button" data-bs-theme="dark" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: white !important"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link  mx-2 fs-6 <?php echo $className; ?>" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  fnt-col mx-2 fs-6" href="#">FC United</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fnt-col mx-2 fs-6" href="#">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fnt-col mx-2 fs-6" href="#">Features
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fnt-col mx-2 fs-6" href="#">Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fnt-col mx-2 fs-6" href="#">Contacts
                    </a>
                </li>
            </ul>
            <div style="display: flex">
                <form class="d-flex" role="search">
                    <input class="search s-t-c" type="search" placeholder="search..." aria-label="Search" />
                </form>
                <button type="button" class="position-relative" style="
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  background-color: #242d3c;
                  border: none;
                  height: 40px;
                  width: 40px;
                  border-radius: 50px;
                  margin-left: 10px;
                ">
                    <img width="15" height="15" src="https://img.icons8.com/ios-glyphs/30/ffffff/shopping-cart--v1.png"
                        alt="shopping-cart--v1" />
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"><span
                            class="visually-hidden">unread messages</span></span>
                </button>

                <div class="dropdown">
                    <button type="button" class="position-relative " style="
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  background-color: #242d3c;
                  border: none;
                  height: 40px;
                  width: 40px;
                  border-radius: 50px;
                  margin-left: 10px;
                " data-bs-toggle="dropdown">

                        <img width="15" height="15"
                            src="https://img.icons8.com/ios-glyphs/30/ffffff/gender-neutral-user.png"
                            alt="gender-neutral-user" />
                    </button>
                    <ul class="dropdown-menu" style=" background-color: #242d3c;">
                        <li><a class="dropdown-item fnt-col" href="/?pages=login">Login</a></li>
                        <li><a class="dropdown-item fnt-col" href="/?pages=register">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- </header> -->