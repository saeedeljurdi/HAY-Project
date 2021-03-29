import { useDialog } from "react-st-modal";
import Axios from "axios";
import React, { useState, useEffect } from "react";
import AddPsychoTrans from "./AddPsychoTrans";
import UpdatePsychoTrans from "./UpdatePsychoTrans";
import ProfilePsychoTrans from "./ProfilePsychoTrans";
import confirm from "react-alert-confirm";
import { Redirect } from "react-router-dom";


import "react-alert-confirm/dist/index.css";
// The element to be shown in the modal window

function UpdateSessionModal(props) {
  const dialog = useDialog();
  const [value, setValue] = useState();
  const [psychologist, setPsychologist] = useState([]);
  const [render, setRender] = useState(false);

  const expireToken = () => {
    localStorage.clear() && <Redirect exact to="/Admin-Login" />;
  };

  useEffect(() => {
    Axios.get("http://localhost:8000/api/psychologist", {
      headers: {
        "content-type": "multipart/form-data",
        Authorization: "Bearer " + localStorage.getItem("tokens"),
      },
    }).then((response) => {
      if (response.data.status === "Token is Expired") {
        expireToken();
        return window.location.reload();
      } else {
        setPsychologist(response.data.psychologist);
      }
    });
  }, [render]);

  const deletePsycho = (id) => {
    confirm({
      lang: "en",
      content: <h3>Are you sure you want to delete?</h3>,
      onOk: () => {
        try {
          Axios.delete(`http://localhost:8000/api/psychologist/${id}`, {
            headers: {
              "content-type": "multipart/form-data",
              Authorization: "Bearer " + localStorage.getItem("tokens"),
            },
          }).then((response) => {
            if (response.data.status === "Token is Expired") {
              expireToken();
              return window.location.reload();
            } else {
              console.log(response.data);
              setRender((prev) => !prev);
            }
          });
        } catch (err) {
          console.log(err);
        }
      },
    });
  };

  return (
    <div>
      <AddPsychoTrans render={{ setRender }} />
      <div style={{ display: "grid", gridTemplateColumns: "1fr" }}>
        {psychologist.map((val) => {
          return (
            <div
              style={{
                display: "grid",
                gridTemplateColumns: "30% 20% 20% 20%",
                width: "100%",
                height: "10vh",
                margin: "3% auto",
              }}
              key={val.id}
            >
              <p style={{ marginTop: "22%", marginLeft: "20%" }}>
                {val.name_en}
              </p>
              <ProfilePsychoTrans data={val} />
              <UpdatePsychoTrans
                render={{ setRender }}
                psychoId={val.id}
                data={val}
              />
              <input
                type="submit"
                style={{ padding: "4.5%", backgroundColor: "red" }}
                value="delete"
                onClick={() => {
                  deletePsycho(val.id);
                }}
              />
            </div>
          );
        })}
      </div>
    </div>
  );
}
export default UpdateSessionModal;
