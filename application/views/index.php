<div class="u-info">
    <h1><?= htmlspecialchars($user->login); ?></h1>
    <div class="counter"><?= htmlspecialchars($user->counter); ?></div>
    <button id="inc">Inc Counter</button>
    <form action="/logout" method="post">
        <button>Logout</button>
    </form>
</div>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .u-info {
        width: 500px;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 10px;
    }

    .counter {
        font-size: 25px;
        color: red;
        text-align: center;
    }
    #inc {
        background: rgb(0, 0, 200);
        color: white;
        font-weight: bold;
    }
</style>

<script>
    window.addEventListener("DOMContentLoaded", () => {
        document.getElementById("inc").addEventListener("click", () => {
            fetch("/inc", {
                method: "POST",
                credentials: "include"
            }).then(
                r => r.json()
            ).then(
                (d) => {
                    document.querySelector(".counter").innerHTML = d.counter;
                }
            )
        })
    })
</script>