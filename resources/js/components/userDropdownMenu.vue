<script setup>

const listItem = [
    {
        'title': 'Accesibilidad',
        'url': '',
    },
    {
        'title': 'Datos',
        'url': '',
    },
    {
        'title': 'Logout',
        'url': '',
    }
]


</script>


<template>
    <div id="userDropdownMenu">
        <div id="dropdownMenuButton">
            <a href="">
                <img src="" alt="">
                <span>Hello</span>
            </a>
            <!-- aqui añadir una flecha hacia abajo -->
        </div>
        <!--componente aqui-->
        <dropdownItems></dropdownItems>
    </div>
</template>
