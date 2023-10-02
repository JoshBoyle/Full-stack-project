<html>
    <?php include "head-tag.php" ?>
    <body>
        <?php include "header.php" ?>
        <section class="advanced search">
            <div class="search-form">
                <div class="column">
                    <div class="box">
                        <div class="price">
                            <label for="price-min">Price Min:</label>
                            <select id="price-min">
                                <option value="">Any</option>
                                <option value="100000">$100,000</option>
                                <option value="200000">$200,000</option>
                            </select>
                            <label for="price-max">Price Max:</label>
                            <select id="price-max">
                                <option value="">Any</option>
                                <option value="500000">$500,000</option>
                                <option value="1000000">$1,000,000</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        <div class="rent">
                            <label for="rent-min">Rent Min:</label>
                            <select id="rentm">
                                <option value="">Any</option>
                                <option value="100000">$100,000</option>
                                <option value="200000">$200,000</option>
                            </select>
                            <label for="rent-max">Rent Max:</label>
                            <select id="rent-max">
                                <option value="">Any</option>
                                <option value="100000">$100,000</option>
                                <option value="200000">$200,000</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="box">
                        <label for="bed-bath">Bed/Bath:</label>
                        <select id="bed-bath">
                            <option value="">Any</option>
                            <option value="1-1">1 Bed/1 Bath</option>
                            <option value="2-2">2 Bed/2 Bath</option>
                        </select>
                    </div>
                    <div class="box">
                        <label for="single-multifamily">Single/Multifamily:</label>
                        <select id="single-multifamily">
                            <option value="">Any</option>
                            <option value="single">Single Family</option>
                            <option value="multifamily">Multifamily</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <div id="search-radius-box" class="box">
                        <label for="search-radius">Search Radius:</label>
                        <select id="search-radius">
                            <option value="5">5 miles</option>
                            <option value="10">10 miles</option>
                            <option value="20">20 miles</option>
                        </select>
                    </div>
                    <div class="box">
                        <div id="price-sqft">
                            <label for="price-sqft-min">Price per Sqft Min:</label>
                            <select id="price-sqft-min">
                                <option value="">Any</option>
                                <option value="50">$50/sqft</option>
                                <option value="100">$100/sqft</option>
                                <!-- Add more options as needed -->
                            </select>
                            <label for="price-sqft-max">Price per Sqft Max:</label>
                            <select id="price-sqft-max">
                                <option value="">Any</option>
                                <option value="150">$150/sqft</option>
                                <option value="200">$200/sqft</option>
                            </select>

                        </div>
                    </div>

                </div>
            </div>
            <div class="search-button">
                <button type="submit">Search</button>
            </div>
        </section>
    </body>
</html>
