const IPFS = require("ipfs-api");

const auth =
  "Basic " +
  Buffer.from(
    "2KLbn8jHtr6uPrVd5Rr1LzwgtSj" + ":" + "0ef9baacff4cc7cfab7ad0c1f87e2c57"
  ).toString("base64");
const ipfs = new IPFS({
  host: "ipfs.infura.io",
  port: 5001,
  protocol: "https",
  headers: {
    authorization: auth,
  },
});

export default ipfs;
