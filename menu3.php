<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index3.php" class="nav-link align-middle px-0">
        <i class="fs-4 bi-house"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Início</span>
    </a>
    <a href="si.php" class="nav-link align-middle px-0">
        <i class="bi bi-clipboard2"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">SI</span>
    </a>
    <a href="semaforica.php" class="nav-link align-middle px-0">
        <i class="bi bi-stoplights"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Semafórica</span>
    </a>
    <a href="carros.php" class="nav-link align-middle px-0">
        <i class="bi bi-speedometer2"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Carros</span>
    </a>
    <a href="projeto.php" class="nav-link align-middle px-0">
        <i class="bi bi-cone-striped"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Projeto</span>
    </a>
    <a href="" class="nav-link align-middle px-0">
        <i class="bi bi-file-earmark-check"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Oficios</span>
    </a>
    <a href="" class="nav-link align-middle px-0">
        <i class="bi bi-globe2"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Certidões</span>
    </a>
    <a href="" class="nav-link align-middle px-0">
        <i class="bi bi-play-btn"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">O.S.</span>
    </a>
    <a href="" class="nav-link align-middle px-0">
        <i class="bi bi-recycle"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Cont. de Implantações</span>
    </a>
    <a href="" class="nav-link align-middle px-0">
        <i class="bi bi-pin-map-fill"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Radar e Estatistica</span>
    </a>
    <a href="" class="nav-link align-middle px-0">
        <i class="bi bi-pencil"></i>&nbsp;&nbsp;<span class="ms-1 d-sm-inline">Relatórios</span>
    </a>
</div>
<!-- Use any element to open the sidenav -->
<span onclick="openNav()" id="botaoMenu">&#9776; Menu</span>

<style>
/* The side navigation menu */
.sidenav {
    height: 100%;
    /* 100% Full-height */
    width: 0;
    /* 0 width - change this with JavaScript */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Stay on top */
    top: 0;
    /* Stay at the top */
    left: 0;
    background-color: #111;
    /* Black*/
    overflow-x: hidden;
    /* Disable horizontal scroll */
    padding-top: 60px;
    /* Place content 60px from the top */
    transition: 0.8s;
    /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#botaoMenu {
    background-color: black;
    color: white;
    border-radius: 15px;
    padding: 5px;
    margin-top: 5px;
    font-size: 30px;
    cursor: pointer;
    padding: 0px 10px 5px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }

    .sidenav a {
        font-size: 18px;
    }
}
</style>
<script>
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("container").style.marginLeft = "136.672"; //136.672
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("container").style.marginLeft = "136.672";
}
</script>