<?php require './17.head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Ans：___</h5>
            <form onsubmit="cde(); return false;">
            <div class="mb-3">
                <label for="a" class="form-label">a</label>
                <input type="number" class="form-control" id="a" name="a">
            </div>
                <div class="mb-3">
                    <label for="b" class="form-label">b</label>
                    <input type="number" class="form-control" id="b" name="b">
                </div>

                <button button type="submit" class="btn btn-primary">Submit</button>
            </form>
  </div>
<?php include ('17.scripts.php'); ?>

<script>
    // 以async、await改寫
    // 底層運作為promise
    async function cde() {
        const a= document.querySelector('#a').value;
        const b= document.querySelector('#b').value;

        const aaa= await fetch(`19.bs-form-xhr-api.php?a=${a}&b=${b}`);
        const bbb= await aaa.text();
        document.querySelector('.card-title').innerHTML =bbb;

        // 另種寫法，可以直接接在一起，不用另作宣告
        // document.querySelector('.card-title').innerHTML = await aaa.text();
        
        // 除錯以 try及catch做確認
/*
        try{
            const aaa= await fetch(`19.bs-form-xhr-api.php?a=${a}&b=${b}`);
            const bbb= await aaa.text();
            ocument.querySelector('.card-title').innerHTML =bbb;
        } catch(ex){
            // 就除錯
        };
*/
    }
</script>

<?php require __DIR__. '/17.foot.php'; ?>