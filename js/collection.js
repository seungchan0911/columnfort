function getIdByParams() {
    const params = new URLSearchParams(window.location.search)
    const idValue = params.get("id")
    return idValue
}
function getSearchByParams() {
    const params = new URLSearchParams(window.location.search)
    const searchValue = params.get("search")
    return searchValue
}

function pushParamsToTitle() {
    const collectionTitle = document.querySelector(".collection-title")
    const idParam = getIdByParams()
    const searchParam = getSearchByParams()

    if (searchParam) {
        collectionTitle.textContent = `Search: ${searchParam}`
    } else if (idParam) {
        collectionTitle.textContent = idParam
    } else {
        collectionTitle.textContent = "No results"
    }
}

pushParamsToTitle()

function getCollection() {
    fetch("collection.json")
        .then(response => response.json())
        .then(data => {
            const itemsFrame = document.querySelector(".items-frame")
            const categoryId = getIdByParams()
            const searchKeyword = getSearchByParams()?.toLowerCase()

            let itemsToShow = []

            if (searchKeyword) {
                for (const category in data) {
                    const matchedItems = data[category].filter(item =>
                        item.title.toLowerCase().includes(searchKeyword)
                    )
                    itemsToShow = itemsToShow.concat(matchedItems)
                }
            } else if (categoryId === "all") {
                for (const category in data) {
                    itemsToShow = itemsToShow.concat(data[category])
                }
            } else if (categoryId && data[categoryId]) {
                itemsToShow = data[categoryId]
            }

            itemsFrame.innerHTML = ""

            if (itemsToShow.length === 0) {
                itemsFrame.innerHTML = `<p>No results found.</p>`
            } else {
                itemsToShow.forEach(item => {
                    const itemObj = document.createElement("a")
                    itemObj.className = `item ${item.id}`
                    itemObj.href = `../detail.html?id=${item.id}`

                    itemObj.innerHTML = `
                        <img src="${item.image || './img/placeholder.png'}" alt="${item.title}">
                        <div class="item-info">
                            <div class="item-title">${item.title}</div>
                            <div class="item-price">${item.price.toLocaleString()}￦</div>
                        </div>
                    `
                    itemsFrame.appendChild(itemObj)
                })
            }
        })
        .catch(error => {
            console.error("데이터를 불러오는 데 실패했습니다:", error)
        })
}

getCollection()