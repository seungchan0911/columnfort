// function getIdByParams() {
//     const params = new URLSearchParams(window.location.search)
//     return params.get("id")
// }

// function getItemById(targetId) {
//     return fetch("data/collection.json")
//         .then(response => response.json())
//         .then(data => {
//             for (const category in data) {
//                 const found = data[category].find(item => item.id === targetId)
//                 if (found) return found
//             }
//             throw new Error("Item not found")
//         })
// }

// function renderItemDetail() {
//     const itemId = getIdByParams()

//     getItemById(itemId)
//         .then(item => {
//             document.querySelector(".item-img img").src = item.image || item.image
//             document.querySelector(".item-img img").alt = item.title
//             document.querySelector(".item-title").textContent = item.title
//             document.querySelector(".item-price").textContent = `${item.price.toLocaleString()}￦`
//         })
//         .catch(error => {
//             console.error("아이템 로딩 실패:", error)
//             document.querySelector(".item").innerHTML = "<p>해당 상품을 찾을 수 없습니다.</p>"
//         })
// }

// renderItemDetail()

// function getRandomItem() {
//     return fetch("data/collection.json")
//         .then(response => response.json())
//         .then(data => {
//             const allItems = []

//             for (const category in data) {
//                 allItems.push(...data[category])
//             }

//             const randomIndex = Math.floor(Math.random() * allItems.length)

//             return allItems[randomIndex]
//         })
// }

// function randomButtonLocation() {
//     document.querySelector(".random-button").onclick = () => {
//         getRandomItem()
//             .then(item => {
//                 window.location.href = `detail?id=${item.id}`
//             })
//             .catch(error => {
//                 console.error("아이템 로딩 실패:", error)
//             })
//     }
// }

// randomButtonLocation()

function getIdByParams() {
    const params = new URLSearchParams(window.location.search)
    return params.get("id")
}

function getItemById(targetId) {
    return fetch(`/api/product/${targetId}`)
        .then(response => {
            if (!response.ok) throw new Error("Network response was not ok")
            return response.json()
        })
}

function renderItemDetail() {
    const itemId = getIdByParams()

    getItemById(itemId)
        .then(item => {
            document.querySelector(".item-img img").src = item.image || './img/placeholder.png'
            document.querySelector(".item-img img").alt = item.title
            document.querySelector(".item-title").textContent = item.title
            document.querySelector(".item-price").textContent = `${item.price.toLocaleString()}￦`
        })
        .catch(error => {
            console.error("아이템 로딩 실패:", error)
            document.querySelector(".item").innerHTML = "<p>해당 상품을 찾을 수 없습니다.</p>"
        })
}

renderItemDetail()

function getRandomItem() {
    return fetch("/api/product/random")
        .then(response => {
            if (!response.ok) throw new Error("Network response was not ok")
            return response.json()
        })
}

function randomButtonLocation() {
    document.querySelector(".random-button").onclick = () => {
        getRandomItem()
            .then(item => {
                window.location.href = `detail?id=${item.id}`
            })
            .catch(error => {
                console.error("아이템 로딩 실패:", error)
            })
    }
}

randomButtonLocation()