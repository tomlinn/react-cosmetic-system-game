import React, { useState } from "react";
import { productsData } from "./data";
import People from "./People";

const Coins = ({ amount }) => (
    <>
        <img
            src="assets/images/icon_coin.png"
            width="15px"
            alt="Coin Icon"
            className="image"
        />
        <span className="text">{amount}</span>
    </>
);


const PeopleName = () => (
    <div className="person-name-container">
        <span className="person-name">Tom Lin</span>
    </div>
)

const Grid = ({ setCosmeticImage, productType, productsData }) => {

    const { data } = productsData;
    const products = data.filter((product) => product.type === productType);

    const rows = products.length / 3;
    const columns = 3;

    const Title = ({ owned, price }) => {
        if (owned) {
            return <div className="product-owned"><span className="owned-text" >Owned</span></div>;
        }
        else {
            return <div className="product-available"><Coins amount={price} /></div>;
        }
    }
    const handleClick = (product) => {
        setCosmeticImage(product.url);
    };

    const renderGrid = () => {
        const grid = [];
        for (let rowIndex = 0; rowIndex < rows; rowIndex++) {
            const row = [];
            for (let j = 0; j < columns; j++) {
                const item = products[rowIndex * columns + j];

                row.push(
                    <div className="product" onClick={() => handleClick(item)}>
                        <img src={item.url} className="product-img" />
                        <Title owned={item.owned} price={item.price} />
                    </div>
                );
            }
            grid.push(row);
        }

        return grid;
    };
    return (
        <div className="grid-container">
            {renderGrid().map((row, rowIndex) => (
                <div key={rowIndex} className="grid-row">
                    {row}
                </div>
            ))}
        </div>
    );
};

export default function App() {
    const [characterImage, setCharacterImage] = useState(
        "assets/images/characters/ca fix.gif"
    );
    const [cosmeticImage, setCosmeticImage] = useState(
        "assets/images/characters/ca_top_AI.gif"
    );

    return (
        <div className="container">
            <div className="inner-container">
                <div className="part part-1">
                    <img
                        src="https://ching-yang.com/game01/data/user_display_img/icon_shop_main.png"
                        width="20%"
                        alt="Image"
                        className="image"
                    />
                </div>
                <div className="part part-2">
                    <img
                        src="https://ching-yang.com/game01/data/user_display_img/button_previous%20page.png"
                        className="top-left"
                    />
                    <div className="bottom-left">
                        <Coins amount={888} />
                    </div>
                    <img
                        src="assets/user_display_img/button_buy.png"
                        className="bottom-right"
                    />
                    <div className="center">
                        <People
                            characterImage={characterImage}
                            cosmeticImage={cosmeticImage}
                        />
                        <PeopleName />
                    </div>
                </div>
                <div className="part part-3">
                    <div className="product-catalog">Headgear</div>
                    <Grid setCosmeticImage={setCosmeticImage} productType={0} productsData={productsData} />
                    <div className="product-catalog">Outfit</div>
                    <Grid setCosmeticImage={setCosmeticImage} productType={1} productsData={productsData} />
                </div>
            </div>
        </div>
    );
}
