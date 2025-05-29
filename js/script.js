const introLogo = document.querySelector(".intro-logo")

let targetX = 0
let targetY = 0
let currentX = 0
let currentY = 0
const maxMove = 50

window.addEventListener("pointermove", (e) => {
    const { innerWidth, innerHeight } = window
    const xRatio = (e.clientX / innerWidth - 0.5) * 2
    const yRatio = (e.clientY / innerHeight - 0.5) * 2

    targetX = xRatio * maxMove
    targetY = yRatio * maxMove
})

function animate() {
    const dx = targetX - currentX
    const dy = targetY - currentY


    currentX += dx * 0.01
    currentY += dy * 0.01

    introLogo.style.transform = `translate(${currentX}px, ${currentY}px)`

    requestAnimationFrame(animate)
}

window.addEventListener("resize", () => {
    if (window.innerWidth > 450)
        animate()
})