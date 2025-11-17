// Section2 Component - second content section with CTA button
app.component('section-two', {

    props: {
        loginUrl: { type: String, required: true }
    },
    template: /*html*/`
    <section class="secondary-bg">
        <div class="display-flex reverse ml-l">
            <div class="card img display-flex">
                <img src="assets/fondoPreview.png" alt="">
            </div>
            <div class="text-right mx-giant textCard">
                <h2 class="blue-color text-giant">Relax and Create</h2>
                <p class="white-color text-l regular">
                    As the garden grows, so do the opportunities: complete quests, help your neighbors with daily tasks, and discover the beauty in the smallest things. Whether you are planting in the soil, collecting resources, or fulfilling magical errands, there is always something new to do. With a calm pace and adorable aesthetic, Mushrooms Garden invites you to enjoy the process of cultivating and letting the magic bloom.
                </p>
                <div class="btn-play-container ">
                <div >
                    <a class="btn-play blue-bg white-color text-xl black-hover" :href="loginUrl">Game</a>
                </div>
            </div>
        </div>
    </section>
    `
});
