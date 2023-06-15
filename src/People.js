import React from "react";
const People = ({ characterImage, cosmeticImage }) => (
    <div className="person-img-container">
        <img
            src={characterImage}
            alt="Character 1"
            className="people_img"
        />
        <img
            src={cosmeticImage}
            alt="Cosmetic"
            className="people_img"
        />
    </div>
);

export default People;