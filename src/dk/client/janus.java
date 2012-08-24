package dk.client;

import com.google.gwt.core.client.EntryPoint;

public class janus implements EntryPoint {
  public void onModuleLoad() {
    IntegerMath.exportStaticMethod();
    launchEmscripten();
  }
  private static native void launchEmscripten() /*-{
	$wnd.run();
  }-*/;
}
