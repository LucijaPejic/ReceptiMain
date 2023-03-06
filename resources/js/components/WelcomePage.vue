<template>
    <v-app>
        <v-row>
            <v-col class="pa-0">
                <div
                    class="welcomePage d-flex align-items-center justify-content-center"
                >
                    <div class="welcome">
                        <h1 class="display-2 black--text">
                            Ukusni Recepti
                        </h1>
                    </div>
                </div>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="pa-0">
                <my-footer></my-footer>
            </v-col>
        </v-row>
    </v-app>
</template>
<style scoped>
.welcomePage {
    height: 600px;
    background-image: url("https://images.squarespace-cdn.com/content/53b839afe4b07ea978436183/1608506201082-GU22QYZJC5TWXRSY24RX/traditional-food-around-the-world-Travlinmad.jpg?content-type=image%2Fjpeg");
    background-size: cover;
}
.welcome {
    background-color: white;
    border-radius: 8px;
    opacity: 0.78;
    padding: 10px;
}
</style>
