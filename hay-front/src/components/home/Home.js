import React, { useState, useEffect, useContext } from "react";
import Navigation from "../navigation/Navigation";
import { Link } from "react-router-dom";
import "./Home.css";
import Axios from "axios";
import AOS from "aos";
import "aos/dist/aos.css";
import Mission from "../../images/missions.jpg";
import Vision from "../../images/visions.jpg";
import Footer from "../Footer/Footer";

AOS.init();
const Home = () => {
  const [language, setLanguage] = useState(false);
  const [imageLanguage, setImageLanguage] = useState(false);
  const [data, setData] = useState([]);

  useEffect(() => {
    Axios.get("http://localhost:8000/api/home", {
      headers: {
        "content-type": "multipart/form-data",
        Authorization: "Bearer " + localStorage.getItem("token"),
      },
    }).then((response) => {
      setData(response.data.home);
      AOS.init({
        duration: 3000,
      });
    });
  }, []);

  return (
    <div>
      <Navigation />
      <div className="homeimage">
        <span style={{ color: "white", position: "relative", top: "35%" }}>
          Ar
        </span>{" "}
        <label style={{ position: "relative", top: "35%" }} className="switch">
          <input
            style={{ position: "relative", top: "35%" }}
            type="checkbox"
            onChange={(e) => {
              setImageLanguage(e.target.checked);
            }}
          />
          <span className="slider round"></span>
        </label>
        <span style={{ color: "white", position: "relative", top: "35%" }}>
          En
        </span>
        {imageLanguage === true ? (
          <h1 style={{ paddingTop: "17%", fontSize: "25px" }} className="title">
            Here is the safe space you’ve been looking for!{" "}
          </h1>
        ) : (
          <h1 style={{ paddingTop: "17%", fontSize: "25px" }} className="title">
            هذا هو المكان الآمن الذي كنت تبحث عنه!
          </h1>
        )}
        <div
          style={{
            width: "30%",
            margin: "0 auto",
            display: "flex",
            justifyContent: "space-around",
          }}
        >
          <a
            href="#our-missions"
            id="signin"
            className="HomeButtons"
            style={{
              marginTop: "5%",
              padding: "3.5%",
              borderRadius: "15px",
              width: "130px",
              height: "50px",
            }}
          >
            Our Missions
          </a>
          <a
            href="#our-missions"
            id="signin"
            className="HomeButtons"
            style={{
              marginTop: "5%",
              padding: "3.5%",
              borderRadius: "15px",
              width: "130px",
              height: "50px",
            }}
          >
            Our Visions
          </a>
        </div>
      </div>

      <div className="Home" style={{ height: "118vh" }}>
        <span style={{ color: "white" }}>Ar</span>{" "}
        <label className="switch">
          <input
            type="checkbox"
            onChange={(e) => {
              setLanguage(e.target.checked);
            }}
          />
          <span className="slider round"></span>
        </label>
        <span style={{ color: "white" }}>En</span>
        {data.map((val) => {
          return (
            <div
              style={{ display: "grid", gridTemplateColumns: "1fr" }}
              key={val.id}
            >
              <div data-aos="fade-right" style={{ marginTop: "-8%" }}>
                <div id="our-missions" style={{ width: "100%" }}>
                  {" "}
                  {language === true ? (
                    <div className="englishmissions">
                      <h3 style={{ fontWeight: "bold", color: "white" }}>
                        {val.missions_title_en}
                      </h3>{" "}
                      <span>{val.missions_en}</span>
                    </div>
                  ) : (
                    <div className="arabicmissions">
                      <h3 style={{ fontWeight: "bold", color: "white" }}>
                        {val.missions_title_ar}
                      </h3>{" "}
                      <span>{val.missions_ar}</span>
                    </div>
                  )}
                </div>
              </div>
              <div className="wave">
                <span style={{ "--i": 1 }}>H</span>
                <span style={{ "--i": 2 }}>O</span>
                <span style={{ "--i": 3 }}>W</span>
                <span style={{ "--i": 4 }}>A</span>
                <span style={{ "--i": 5 }}>R</span>
                <span style={{ "--i": 6 }}>E</span>
                <span style={{ "--i": 6 }}>Y</span>
                <span style={{ "--i": 6 }}>O</span>
                <span style={{ "--i": 6 }}>U</span>
              </div>

              <div
                data-aos="fade-left"
                style={{ width: "100%", marginTop: "-5%" }}
              >
                <div id="our-visions">
                  {language === true ? (
                    <div className="englishvisions">
                      <h3 style={{ fontWeight: "bold", color: "white" }}>
                        {val.visions_title_en}
                      </h3>{" "}
                      <span>{val.visions_en}</span>
                    </div>
                  ) : (
                    <div className="arabicvisions">
                      <h3 style={{ fontWeight: "bold", color: "white" }}>
                        {val.visions_title_ar}
                      </h3>{" "}
                      <span>{val.visions_ar}</span>
                    </div>
                  )}
                </div>
              </div>
            </div>
          );
        })}
      </div>

      <div
        className="flex-wrapper"
        style={{
          display: "flex",
          height: "120vh",
          justifyContent: "space-around",
        }}
      >
        <div
          data-aos="fade-right"
          className="flex-inner"
          style={{ width: "40%" }}
        >
          <img
            style={{ marginTop: "10%", width: "40vw", height: "52.3vh" }}
            id="our-missions"
            src={Mission}
            alt="missions"
          />
          <h1>Group Therapy</h1>
          <p>
            If you're considering psychotherapy, several options are available.
            One of those options is group therapy. Depending on the nature of
            your problem, group therapy can be an ideal choice for addressing
            your concerns and making positive changes in your life.
          </p>
          <Link
            className="booknow"
            id="signin"
            style={{
              padding: "3%",
              borderRadius: "15px",
              width: "130px",
              height: "50px",
            }}
            to="/Book"
          >
            Book Now
          </Link>
        </div>
        <div
          data-aos="fade-left"
          className="flex-inner"
          style={{ width: "40%" }}
        >
          <img
            style={{ marginTop: "10%", width: "40vw", height: "52.3vh" }}
            id="our-visions"
            src={Vision}
            alt="visions"
          />
          <h1>Support Group</h1>
          <p>
            Participating in a group provides you with an opportunity to be with
            people who are likely to have a common purpose and likely to
            understand one another. Benefits of participating in a support group
            may include: Feeling less lonely, isolated or judged. Reducing
            distress, depression, anxiety or fatigue.{" "}
          </p>
          <Link
            className="booknow"
            id="signin"
            style={{
              padding: "3%",
              borderRadius: "15px",
              width: "130px",
              height: "50px",
            }}
            to="/Book"
          >
            Book Now
          </Link>
        </div>
      </div>

      <Footer />
    </div>
  );
};

export default Home;
