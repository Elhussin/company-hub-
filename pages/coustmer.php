

    <div class="container">
        <div class="row">

            <div class="col-8">
                <!-- 2 of 3 (wider) -->

                <!--Coustmer Datiels  -->
                <div id="datil">

                    <table class="table  caption-top">
                        <caption>Coustmer Datiels</caption>
                        <thead>

                            <tr class="table-secondary ">
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">NAME</th>
                                <th scope="col">ID</th>
                                <th scope="col">MOPLIE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <th scope="row">1</th> -->

                                <td>hussain </td>
                                <td> 12345</td>
                                <td> 0108704401</td>

                            </tr>
                    </table>

                </div>
                <button class="btn btn-danger" id="bt" onclick="disply1()"> View Eye Test</button>
                <!-- invoice -->


                <button id="bt" onclick="disply2()">Invoice</button>
                <div id="invoic" style="display: none;">

                    <table class="table  caption-top">
                        <caption> invoice Date 20 /10/2021</caption>
                        <thead>

                            <tr class="table-dark">
                                <th scope="col" onclick="displyofi()" class="btn btn-danger">X</th>

                                <th scope="col">Type</th>
                                <th scope="col"> Code </th>
                                <th scope="col"> Datiels </th>

                                <th scope="col"> Coust </th>
                                <th scope="col"> Iteam </th>
                                <th scope="col"> Totale </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col">1</th>
                                <td>frame</td>
                                <td> 100001</td>
                                <td> frame sg</td>
                                <td>200 </td>
                                <td>2</td>
                                <td>400</td>

                            </tr>
                            <tr>
                                <th scope="col">2</th>
                                <td> lens </td>
                                <td> 10002 </td>
                                <td> lens</td>
                                <td> 100</td>
                                <td> 2</td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <th scope="col">Total </th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>


                                <td> 4</td>
                                <td>600</td>
                            </tr>
                    </table>

                </div>


            </div>



            <!-- 3333 -->

            <div id="test" style="display: none;">

                <table class="table caption-top">
                    <caption>Eye Test Data</caption>
                    <thead>
                        <tr class="table-dark">
                            <th scope="col" onclick="displyofe()" class="btn btn-danger">X</th>
                            <th scope="col"></th>
                            <th scope="col">RIGHET</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">LEFT</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Inform</th>
                            <th scope="col"></th>

                        </tr>
                        <tr class="table-success bordered border-primary">
                            <th scope="col "> </th>

                            <th scope="col"> SPH </th>
                            <th scope="col"> CYL </th>
                            <th scope="col"> AXE </th>
                            <th scope="col"> SPH </th>
                            <th scope="col"> CYL </th>
                            <th scope="col"> AXE </th>
                            <th scope="col">ADD</th>
                            <th scope="col">PD</th>
                            <th scope="col">SG</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-bordered border-primary">
                            <th scope="col">Dis </th>
                            <td>-1.00 </td>
                            <td> -2.00</td>
                            <td>30 </td>
                            <td>-1.00 </td>
                            <td>-3.0 </td>
                            <td> 50</td>
                            <td> +2.00</td>
                            <td>60</td>
                            <td> 21</td>
                        </tr>
                        <tr class="table-bordered border-primary">
                            <th scope="col">red</th>
                            <td>1</td>
                            <td> 2</td>
                            <td>2 </td>
                            <td>2 </td>
                            <td>2</td>
                            <td>2 </td>
                            <td>2</td>
                            <td>2 </td>
                            <td> 2</td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>



<script>
function displyofe() {
    document.getElementById("test").style.display = "none";
}

function displyofi() {
    document.getElementById("invoic").style.display = "none";
}
function disply1() {
    document.getElementById("test").style.display = "block";
}

function disply2() {
    document.getElementById("invoic").style.display = "block";
}
</script>

</html>