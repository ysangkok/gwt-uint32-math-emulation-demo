package dk.client;

public class IntegerMath {
	public static native void exportStaticMethod() /*-{
		$wnd.mul = $entry(@dk.client.IntegerMath::mul(Ljava/lang/Long;Ljava/lang/Long;));
		$wnd.div = $entry(@dk.client.IntegerMath::div(Ljava/lang/Long;Ljava/lang/Long;));
		$wnd.mod = $entry(@dk.client.IntegerMath::mod(Ljava/lang/Long;Ljava/lang/Long;));
		$wnd.sub = $entry(@dk.client.IntegerMath::sub(Ljava/lang/Long;Ljava/lang/Long;));
		$wnd.add = $entry(@dk.client.IntegerMath::add(Ljava/lang/Long;Ljava/lang/Long;));

		$wnd.mulss = $entry(@dk.client.IntegerMath::mulss(Ljava/lang/String;Ljava/lang/String;));
		$wnd.divss = $entry(@dk.client.IntegerMath::divss(Ljava/lang/String;Ljava/lang/String;));
		$wnd.modss = $entry(@dk.client.IntegerMath::modss(Ljava/lang/String;Ljava/lang/String;));
		$wnd.subss = $entry(@dk.client.IntegerMath::subss(Ljava/lang/String;Ljava/lang/String;));
		$wnd.addss = $entry(@dk.client.IntegerMath::addss(Ljava/lang/String;Ljava/lang/String;));
	}-*/;

/*
	public static String mul(long d1, long q) {
		int e = (int) ((d1*q) & 0xffffffff);
		return Integer.toHexString(e) + " : " + String.valueOf(e);
	}
*/
	public static int mul(Long d1, Long q) {
		return (int) ((d1*q) & 0xffffffff);
	}
	public static int div(Long d1, Long q) {
		return (int) ((d1*q) & 0xffffffff);
	}
	public static int mod(Long d1, Long q) {
		return (int) ((d1%q) & 0xffffffff);
	}
	public static int sub(Long d1, Long q) {
		return (int) ((d1-q) & 0xffffffff);
	}
	public static int add(Long d1, Long q) {
		return (int) ((d1+q) & 0xffffffff);
	}
	public static String mulss(String a, String b) {
		return String.valueOf(mul(Long.valueOf(a),Long.valueOf(b)));
	}
	public static String addss(String a, String b) {
		return String.valueOf(add(Long.valueOf(a),Long.valueOf(b)));
	}
	public static String divss(String a, String b) {
		return String.valueOf(div(Long.valueOf(a),Long.valueOf(b)));
	}
	public static String modss(String a, String b) {
		return String.valueOf(mod(Long.valueOf(a),Long.valueOf(b)));
	}
	public static String subss(String a, String b) {
		return String.valueOf(sub(Long.valueOf(a),Long.valueOf(b)));
	}

//		long d1 = 0x847c9b5d;
//		long q =  0x549530e1;
}
